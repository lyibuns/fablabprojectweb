document.addEventListener("DOMContentLoaded", function () {
    const facilitiesModal = document.getElementById("facilitiesModal");
    const closeFacilitiesModal = document.querySelector(".close-facilities-modal");
    const facilitiesBookButtons = document.querySelectorAll(".book-facility");
    const facilitiesDropdown = document.getElementById("facilitiesSelect");

    // Show modal only for the clicked facility
    facilitiesBookButtons.forEach(button => {
        button.addEventListener("click", function () {
            const selectedFacility = this.getAttribute("data-facility"); // Get facility name from button
            facilitiesDropdown.innerHTML = ""; // Clear previous options

            // Create and append the selected facility as the only option
            let option = document.createElement("option");
            option.value = selectedFacility;
            option.textContent = selectedFacility;
            facilitiesDropdown.appendChild(option);

            facilitiesModal.style.display = "flex"; // Show popup
        });
    });

    // Close the modal when clicking the 'X' button
    closeFacilitiesModal.addEventListener("click", function () {
        facilitiesModal.style.display = "none";
    });

    // Close modal when clicking outside the content box
    window.addEventListener("click", function (event) {
        if (event.target === facilitiesModal) {
            facilitiesModal.style.display = "none";
        }
    });
});
