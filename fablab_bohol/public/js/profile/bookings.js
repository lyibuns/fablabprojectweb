document.addEventListener("DOMContentLoaded", function () {
  const facilitiesModal = document.getElementById("facilitiesModal");
  const closeFacilitiesModal = document.querySelector(".close-facilities-modal");
  const facilitiesBookButtons = document.querySelectorAll(".book-facility");
  const facilitiesDropdown = document.getElementById("facilitiesSelect");
  const timeSlotContainer = document.getElementById("facilitiesTime");

  document.addEventListener("DOMContentLoaded", function () {
    const timeSlotContainer = document.getElementById("facilitiesTime");

    function generateTimeSlots() {
        timeSlotContainer.innerHTML = "";

        let start = 8 * 60;
        const end = 20 * 60;

        while (start < end) {
            const hours = Math.floor(start / 60);
            const minutes = start % 60;
            const endMinutes = start + 30;
            const endHours = Math.floor(endMinutes / 60);
            const endMins = endMinutes % 60;

            const format = (h, m) => {
                const hour12 = h % 12 === 0 ? 12 : h % 12;
                const suffix = h >= 12 ? "PM" : "AM";
                return `${hour12}:${m.toString().padStart(2, "0")} ${suffix}`;
            };

            const label = `${format(hours, minutes)} - ${format(endHours, endMins)}`;

            const wrapper = document.createElement("div");
            wrapper.className = "slot";

            const checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.name = "timeSlots[]";
            checkbox.value = label;
            checkbox.style.display = "none";
            wrapper.appendChild(checkbox);

            const labelEl = document.createElement("span");
            labelEl.textContent = label;
            wrapper.appendChild(labelEl);

            // ✅ Toggle highlight on wrapper
            wrapper.addEventListener("click", () => {
                checkbox.checked = !checkbox.checked;
                if (checkbox.checked) {
                    wrapper.classList.add("checked");
                } else {
                    wrapper.classList.remove("checked");
                }
            });

            timeSlotContainer.appendChild(wrapper);
            start += 30;
        }
    }

    generateTimeSlots(); // Only if you want to generate on page load
});




  // Show modal only for the clicked facility
  facilitiesBookButtons.forEach(button => {
      button.addEventListener("click", function () {
          const selectedFacility = this.getAttribute("data-facility");

          // Update dropdown
          facilitiesDropdown.innerHTML = "";
          let option = document.createElement("option");
          option.value = selectedFacility;
          option.textContent = selectedFacility;
          option.selected = true;
          facilitiesDropdown.appendChild(option);

          // Generate time slots
          generateTimeSlots();

          // Show the modal
          facilitiesModal.style.display = "flex";
      });
  });

  // Close the modal when clicking the 'X' button
  closeFacilitiesModal.addEventListener("click", function () {
      facilitiesModal.style.display = "none";
  });

  // Close modal when clicking outside the modal content
  window.addEventListener("click", function (event) {
      if (event.target === facilitiesModal) {
          facilitiesModal.style.display = "none";
      }
  });
});
