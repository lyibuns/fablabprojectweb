document.addEventListener("DOMContentLoaded", function () {
    heroShowSlides();  // ✅ Auto-start slideshow
});

var heroSlideIndex = 0;
var slideInterval; // ✅ STORE INTERVAL TO CLEAR WHEN NEEDED

function heroShowSlides() {
    var i;
    var slides = document.getElementsByClassName("hero-slide");
    var dots = document.getElementsByClassName("hero-nav-btn");

    // Hide all slides
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // Move to the next slide
    heroSlideIndex++;
    if (heroSlideIndex > slides.length) { heroSlideIndex = 1; } // ✅ LOOP BACK TO FIRST SLIDE

    slides[heroSlideIndex - 1].style.display = "block";

    // Remove active class from dots
    for (i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
    }

    dots[heroSlideIndex - 1].classList.add("active");

    // ✅ CLEAR PREVIOUS INTERVAL TO PREVENT RANDOM SKIPPING
    clearInterval(slideInterval);

    // ✅ SET NEW INTERVAL TO CHANGE SLIDE EVERY 3 SECONDS
    slideInterval = setInterval(heroShowSlides, 3000);
}

function heroCurrentSlide(n) {
    heroSlideIndex = n - 1;
    heroShowSlides();
}
