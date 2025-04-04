document.addEventListener("DOMContentLoaded", function () {
    const facilitiesModal = document.getElementById("facilitiesModal");
    const closeFacilitiesModal = document.querySelector(".close-facilities-modal");
    const facilitiesBookButtons = document.querySelectorAll(".book-facility");
    const facilitiesDropdown = document.getElementById("facilitiesSelect");
    const timeSlotContainer = document.getElementById("facilitiesTime");
    const bookingForm = facilitiesModal.querySelector("form");
    const dateInput = document.getElementById("facilitiesDate");
    const successModal = document.getElementById("successModal");
    const closeSuccessBtn = document.getElementById("closeSuccess");

    
    let isFullyBooked = false;

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

    const formatTime = (h, m) => {
        const hh = h % 12 || 12;
        const suffix = h >= 12 ? "PM" : "AM";
        return `${hh}:${m.toString().padStart(2, "0")} ${suffix}`;
    };

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
                    showError("Max 2 hours (4 slots) per day. Book extra time on another date.");
                    return;
                }

                checkbox.checked = !checkbox.checked;
                wrapper.classList.toggle("checked", checkbox.checked);
            });

            timeSlotContainer.appendChild(wrapper);
            start += 30;
        }

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

    facilitiesBookButtons.forEach(button => {
        button.addEventListener("click", () => {
            const selectedFacility = button.getAttribute("data-facility");

            facilitiesDropdown.innerHTML = `<option selected value="${selectedFacility}">${selectedFacility}</option>`;
            facilitiesModal.style.display = "flex";
            timeSlotContainer.innerHTML = "<p class='text-muted'>Please select a date to see availability.</p>";

            dateInput.onchange = async () => {
                const selectedDate = dateInput.value;
                const booked = await getBookedSlots(selectedFacility, selectedDate);
                generateTimeSlots(booked);
                clearErrors();
            };
        });
    });

    closeFacilitiesModal.addEventListener("click", () => {
        facilitiesModal.style.display = "none";
    });

    window.addEventListener("click", (event) => {
        if (event.target === facilitiesModal) {
            facilitiesModal.style.display = "none";
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

    bookingForm.addEventListener("submit", async function (e) {
        e.preventDefault();
        clearErrors();

        const date = dateInput.value;
        const facility = facilitiesDropdown.value;

        if (isFullyBooked) {
            showError("This date is fully booked. Please choose another.");
            return;
        }

        const timeSlots = Array.from(bookingForm.querySelectorAll('input[name="timeSlots[]"]:checked'))
                               .map(el => el.value);

        if (!date || !facility || timeSlots.length === 0) {
            showError("Please complete all fields.");
            return;
        }

        if (timeSlots.length > 4) {
            showError("Max 2 hours (4 slots) per day. Book extra time on another date.");
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
            timeSlots
        });

        bookingForm.reset();
        facilitiesModal.style.display = "none";
        successModal.style.display = "flex";
    });
});
