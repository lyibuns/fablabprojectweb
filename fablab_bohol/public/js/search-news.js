document.addEventListener("DOMContentLoaded", function () {
    console.log("Search & Filter Script Loaded");

    const searchInput = document.querySelector(".search-filternews input");
    const reportItems = document.querySelectorAll(".report-item");
    const filterButtons = document.querySelectorAll(".newsbtns");

    let activeCategory = "all"; // Default: Show all reports

    // 🔍 SEARCH FUNCTION
    searchInput.addEventListener("input", function () {
        const searchText = searchInput.value.toLowerCase();
        reportItems.forEach(item => {
            const text = item.textContent.toLowerCase();
            const matchesSearch = text.includes(searchText);
            const matchesCategory = activeCategory === "all" || item.dataset.category === activeCategory;
            
            item.style.display = matchesSearch && matchesCategory ? "block" : "none";
        });
    });

    // 📂 FILTER FUNCTION (Button Click)
    filterButtons.forEach(button => {
        button.addEventListener("click", function () {
            activeCategory = this.dataset.category;
            console.log("Filtering by:", activeCategory);

            // Remove 'active' class from all buttons
            filterButtons.forEach(btn => btn.classList.remove("active"));

            // Add 'active' class to the clicked button
            this.classList.add("active");

            // Show/Hide reports based on category & search
            reportItems.forEach(item => {
                const matchesCategory = activeCategory === "all" || item.dataset.category === activeCategory;
                const matchesSearch = item.textContent.toLowerCase().includes(searchInput.value.toLowerCase());

                item.style.display = matchesCategory && matchesSearch ? "block" : "none";
            });
        });
    });
});
