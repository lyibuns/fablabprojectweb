<!DOCTYPE html>
<html lang="en">
<head>

@include('NavBars.head')

</head>
<body>

@yield('content')
 <!--Navigation Bar -->   
 @include('NavBars.navbar')
        
    <!-- Facilities Page Content -->
    <main>
        <h1>Our Facilities</h1>
        <p>FABLAB Bohol is equipped with state-of-the-art digital fabrication tools. Below is a list of our key equipment that enables rapid prototyping and manufacturing.</p>

        <section class="facilities-list">

            <div class="facility">
                <img src="{{ asset('../images/mac3d.png') }}" alt="3D Printer">
                <h3>3D Printer</h3>
                <p>Our 3D printers allow you to create plastic prototypes and functional parts using various filaments such as PLA, ABS, and PETG.</p>
                <button class="book-facility" data-facility="3D Printer">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/maclaser.png') }}" alt="Laser Cutter">
                <h3>Laser Cutting Machine</h3>
                <p>Precision cutting and engraving on materials like wood, acrylic, and leather using high-powered CO2 laser technology.</p>
                <button class="book-facility" data-facility="3D Printer">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/maccnc.png') }}" alt="CNC Milling Machine">
                <h3>CNC Milling Machine</h3>
                <p>High-precision milling and engraving on metals and plastics for prototyping and production.</p>
                <button class="book-facility" data-facility="3D Printer">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/macvinyl.png') }}" alt="Vinyl Cutter">
                <h3>Vinyl Cutter</h3>
                <p>Ideal for making stickers, signage, and fabric transfers using precision cutting technology.</p>
                <button class="book-facility" data-facility="3D Printer">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/macemb.png') }}" alt="Digital Embroidery Machine">
                <h3>Digital Embroidery Machine</h3>
                <p>Customize apparel and textiles with intricate embroidery designs.</p>
                <button class="book-facility" data-facility="3D Printer">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/macscan.png') }}" alt="3D Scanner">
                <h3>3D Scanner</h3>
                <p>Convert real-world objects into digital models for 3D printing or CAD design.</p>
                <button class="book-facility" data-facility="3D Printer">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/macvaq.png') }}" alt="Vaquform">
                <h3>Vaquform</h3>
                <p>A thermoforming machine that heats plastic sheets and molds them over a form, perfect for creating custom packaging, molds, and prototypes.</p>
                <button class="book-facility" data-facility="3D Printer">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/macronald.png') }}" alt="Print and Cut">
                <h3>Print and Cut Machine</h3>
                <p>A large-format printer with a built-in cutter, ideal for creating stickers, decals, signage, and custom graphics with precision.</p>
                <button class="book-facility" data-facility="3D Printer">Book Now</button>
            </div>

        </section>

        <!-- Popup Modal -->
<!-- Facilities Booking Modal -->
<div id="facilitiesModal" class="facilities-modal">
    <div class="facilities-modal-content">
        <span class="close-facilities-modal">&times;</span>
        <h2>Book a Facility</h2>
        <p>Fill out the form to reserve a facility.</p>
        <form>
            <label for="facilitiesName">Your Name:</label>
            <input type="text" id="facilitiesName" placeholder="Enter your name" required>

            <label for="facilitiesDate">Select Date:</label>
            <input type="date" id="facilitiesDate" required>

            <label for="facilitiesSelect">Select Facility:</label>
            <select id="facilitiesSelect">
                <!-- Facilities will be added dynamically -->
            </select>

            <button type="submit">Confirm Booking</button>
        </form>
    </div>
</div>


    </main>

    <nav class="bottom-bar">
        <div class="botlogos">
        <img src="../images/bottombar_fablab.png" alt="fablab" class="bottom-bar-img">
        <img src="../images/bottombar_dti.png" alt="dti" class="bottom-bar-img">
        <img src="../images/bottombar_bisu.png" alt="bisu" class="bottom-bar-img">
        <img src="../images/bottombar_dost.png" alt="dost" class="bottom-bar-img">
        <img src="../images/bottombar_jica.png" alt="jica" class="bottom-bar-img">  
        </div>
            <div class="botlearnmore">
            <h5>Learn More</h5>
            <ul>
                <li><a href="{{ route('events') }}">Events</a></li>
                <li><a href="">Newsletter</a></li>
            </ul>
            </div>
            <div class="botorg">
            <h5>Organization</h5>
            <ul>
                <li><a href="{{ route('aboutus') }}">About Us</a></li>
                <li><a href="{{ route('facilities') }}">Facilities</a></li>
                <li><a href="">Policy</a></li>
                <li><a href="">FAQs</a></li>
            </ul>
            </div>

            <div class="botconnect">
            <h5>Connect with Us</h5>
            <ul>
                <li><img src="../images/logoloc.png" alt="Location">BISU Main Campus CPG Avenue, Tagbilaran City, Bohol</li>
                <li><img src="../images/logocontact.png" alt="Phone">411-3147</li>
                <li><img src="../images/logoemail.png" alt="Email"><a href="mailto:fablabbhl@gmail.com">fablabbhl@gmail.com</a></li>
            <div class="vertlogo">
            <a href="https://www.facebook.com/fablabbohol" target="_blank">

            <img src="../images/logofb.png" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/fablab.bohol/" target="_blank">
                <img src="../images/logoig.png" alt="Instagram">    
            </a>
            <a href="https://m.me/fablabbohol" target="_blank">
                <img src="../images/logomess.png" alt="Messenger">
            <a>
            </div>
            </ul>
            </div>
        </nav>

<!-- Link to External JavaScript File -->
<script src="js/booking-popup.js"></script>
</body>
</html>

