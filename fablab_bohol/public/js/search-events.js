document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM fully loaded. Script is running...");

    const searchInput = document.querySelector(".search-filter input");

    if (!searchInput) {
        console.error("Search input not found!");
        return;
    } else {
        console.log("Search input found!");
    }

    searchInput.addEventListener("input", function () {
        const searchText = searchInput.value.toLowerCase();
        console.log("User searched:", searchText);

        const items = document.querySelectorAll(".event-box");

        if (items.length === 0) {
            console.error("No event-box elements found!");
            return;
        }

        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchText)) {
                item.style.display = "block";
                console.log("Showing:", item.textContent);
            } else {
                item.style.display = "none";
                console.log("Hiding:", item.textContent);
            }
        });
    });
});
