function openNav() {
    document.getElementById("mySidepanel").style.width = "200px"; // ✅ Adjust width
    document.getElementById("mySidepanel").classList.add("open");
    document.getElementById("overlay").style.display = "block"; // ✅ Show overlay
}

function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
    document.getElementById("mySidepanel").classList.remove("open");
    document.getElementById("overlay").style.display = "none"; // ✅ Hide overlay
    
}
