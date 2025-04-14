document.addEventListener("DOMContentLoaded", function () {
    const facilitiesModal = document.getElementById("facilitiesModal");
    const closeFacilitiesModal = document.querySelector(".close-facilities-modal");
    const facilitiesBookButtons = document.querySelectorAll(".book-facility");
    const facilitiesDropdown = document.getElementById("facilitiesSelect");
    const timeSlotContainer = document.getElementById("facilitiesTime");
    const bookingForm = facilitiesModal?.querySelector("form");
    const dateInput = document.getElementById("facilitiesDate");
    const successModal = document.getElementById("successModal");
    const closeSuccessBtn = document.getElementById("closeSuccess");

    
    let isFullyBooked = false;
    let currentFacility = null;

    const errorContainer = document.createElement("div");
    errorContainer.className = "alert alert-danger mt-2 d-none";
    bookingForm.insertBefore(errorContainer, bookingForm.querySelector("button[type='submit']"));

    function showError(message) {
        errorContainer.textContent = message;
        errorContainer.classList.remove("d-none");
    }

    function clearErrors() {
        errorContainer.classList.add("d-none");
        errorContainer.textContent = "";
    }
  
    function formatTime(h, m) {
        const hh = h % 12 || 12;
        const suffix = h >= 12 ? "PM" : "AM";
        return `${hh}:${m.toString().padStart(2, "0")} ${suffix}`;
    }

    async function getBookedSlots(facility, date) {
        const snapshot = await db.collection("bookings")
            .where("facility", "==", facility)
            .where("date", "==", date)
            .get();

        const booked = [];
        snapshot.forEach(doc => {
            const data = doc.data();
            if (data.timeSlots) booked.push(...data.timeSlots);
        });

        return booked;
    }

    function generateTimeSlots(booked = []) {
        timeSlotContainer.innerHTML = "";
        let start = 8 * 60;
        const end = 20 * 60;

        while (start < end) {
            const hours = Math.floor(start / 60);
            const minutes = start % 60;
            const endMinutes = start + 30;
            const endHours = Math.floor(endMinutes / 60);
            const endMins = endMinutes % 60;

            const label = `${formatTime(hours, minutes)} - ${formatTime(endHours, endMins)}`;

            if (booked.includes(label)) {
                start += 30;
                continue;
            }

            const wrapper = document.createElement("div");
            wrapper.className = "slot";

            const checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.name = "timeSlots[]";
            checkbox.value = label;
            checkbox.style.display = "none";

            const checkIcon = document.createElement("span");
            checkIcon.className = "check-icon";
            checkIcon.textContent = "✔";

            const labelEl = document.createElement("span");
            labelEl.textContent = label;

            wrapper.appendChild(checkbox);
            wrapper.appendChild(checkIcon);
            wrapper.appendChild(labelEl);

            wrapper.addEventListener("click", () => {
                const checkedCount = bookingForm.querySelectorAll('input[name="timeSlots[]"]:checked').length;

                if (!checkbox.checked && checkedCount >= 4) {
                    showError("Oops! You've reached the 2-hour (4-slot) limit. Choose another day for more time.");
                    return;
                }

                checkbox.checked = !checkbox.checked;
                wrapper.classList.toggle("checked", checkbox.checked);
            });

            timeSlotContainer.appendChild(wrapper);
            start += 30;
        }

        isFullyBooked = timeSlotContainer.children.length === 0;

        if (isFullyBooked) {
            timeSlotContainer.innerHTML = `All time slots for this facility on this date are fully booked.`;

        if (timeSlotContainer.children.length === 0) {
            isFullyBooked = true;
            timeSlotContainer.innerHTML = `
                <p class="text-danger mb-2">
                    All time slots for this facility on this date are fully booked.
                </p>
            `;
        } else {
            isFullyBooked = false;

        }
    }

    // Check if user is authenticated
    const checkUserAuth = () => {
        const user = firebase.auth().currentUser;
        if (!user) {
            showError("Please log in first to book a facility.");
            return false;
        }
        return true;
    };

    // Get user first and last name from Firestore users collection
    const getUserName = async (uid) => {
        try {
            const userDoc = await db.collection("users").doc(uid).get();
            if (userDoc.exists) {
                const data = userDoc.data();
                return {
                    firstName: data.firstName || "Unknown",
                    lastName: data.lastName || "User"
                };
            }
        } catch (err) {
            console.error("Error fetching user name:", err);
        }
        return { firstName: "Unknown", lastName: "User" };
    };

    facilitiesBookButtons.forEach(button => {
        button.addEventListener("click", () => {
            if (!checkUserAuth()) return;

            currentFacility = button.getAttribute("data-facility");
            facilitiesDropdown.innerHTML = `<option selected value="${currentFacility}">${currentFacility}</option>`;

            facilitiesModal.style.display = "flex";
            timeSlotContainer.innerHTML = "<p class='text-muted'>Please select a date to see availability.</p>";

            dateInput.addEventListener("change", async () => {
                const selectedDate = dateInput.value;
                const booked = await getBookedSlots(currentFacility, selectedDate);
                generateTimeSlots(booked);
                clearErrors();

            });

  
        });
    });

    closeFacilitiesModal?.addEventListener("click", () => {
        facilitiesModal.style.display = "none";
    });

    closeSuccessBtn?.addEventListener("click", () => {
        successModal.style.display = "none";
        location.reload();
    });

    window.addEventListener("click", (event) => {
        if (event.target === facilitiesModal || event.target === successModal) {
            event.target.style.display = "none";
            location.reload();
        }
        if (event.target === successModal) {
            successModal.style.display = "none";
            location.reload();
        }
    });

    closeSuccessBtn.addEventListener("click", () => {
        successModal.style.display = "none";
        location.reload();
    });

    // Booking form submission
    if (!bookingForm.hasAttribute("data-listener-attached")) {
        bookingForm.addEventListener("submit", async function (e) {
            e.preventDefault();
            clearErrors();

            const date = dateInput.value;
            const facility = currentFacility;
            const user = firebase.auth().currentUser;

            if (!checkUserAuth()) return;

            const { firstName, lastName } = await getUserName(user.uid);

            const timeSlots = Array.from(bookingForm.querySelectorAll('input[name="timeSlots[]"]:checked'))
                .map(el => el.value);

            if (timeSlots.length > 4) {
                showError("Oops! You've reached the 2-hour (4-slot) limit. Choose another day for more time.");
                return;
            }


            if (!date || !facility || timeSlots.length === 0) {
                showError("Please complete all fields.");
                return;
            }

            const alreadyBooked = await getBookedSlots(facility, date);
            const conflict = timeSlots.find(slot => alreadyBooked.includes(slot));
            if (conflict) {
                showError(`Time slot "${conflict}" is already booked. Please choose another.`);
                return;
            }

            await db.collection("bookings").add({
                facility,
                date,
                timeSlots,
                userEmail: user.email,
                userUID: user.uid,
                firstName: firstName,
                lastName: lastName
            });

            bookingForm.reset();
            facilitiesModal.style.display = "none";
            successModal.style.display = "flex";
        });

        bookingForm.setAttribute("data-listener-attached", "true");
    }

});
