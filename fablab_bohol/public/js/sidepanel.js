function openNav() {
    document.getElementById("mySidepanel").style.width = "250px";
    document.getElementById("overlay").style.display = "block"; // ✅ Show shadow overlay
}

function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
    document.getElementById("overlay").style.display = "none"; // ✅ Hide shadow overlay
}
