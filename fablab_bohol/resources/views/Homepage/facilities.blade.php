<!DOCTYPE html>
<html lang="en">
<head>

@include('NavBars.head')


</head>
<body>

@yield('content')
 <!--Navigation Bar -->   
 @include('NavBars.navbar')
 
 @include('NavBars.sidebar')
        
    <!-- Facilities Page Content -->
    <main>
        <div class="fac-intro">
            <h1>Reserve Our Facilities Now.</h1>
            <p>FABLAB Bohol is equipped with state-of-the-art digital fabrication tools. Below is a list of our key equipment that enables rapid prototyping and manufacturing.</p>
        </div>

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
                <button class="book-facility" data-facility="Laser Cutter">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/maccnc.png') }}" alt="CNC Milling Machine">
                <h3>CNC Milling Machine</h3>
                <p>High-precision milling and engraving on metals and plastics for prototyping and production.</p>
                <button class="book-facility" data-facility="CNC Milling Machine">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/macvinyl.png') }}" alt="Vinyl Cutter">
                <h3>Vinyl Cutter</h3>
                <p>Ideal for making stickers, signage, and fabric transfers using precision cutting technology.</p>
                <button class="book-facility" data-facility="Vinyl Cutter">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/macemb.png') }}" alt="Digital Embroidery Machine">
                <h3>Digital Embroidery Machine</h3>
                <p>Customize apparel and textiles with intricate embroidery designs.</p>
                <button class="book-facility" data-facility="Digital Embroidery">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/macscan.png') }}" alt="3D Scanner">
                <h3>3D Scanner</h3>
                <p>Convert real-world objects into digital models for 3D printing or CAD design.</p>
                <button class="book-facility" data-facility="3D Scanner">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/macvaq.png') }}" alt="Vaquform">
                <h3>Vaquform</h3>
                <p>A thermoforming machine that heats plastic sheets and molds them over a form, perfect for creating custom packaging, molds, and prototypes.</p>
                <button class="book-facility" data-facility="Vaquform">Book Now</button>
            </div>

            <div class="facility">
                <img src="{{ asset('../images/macronald.png') }}" alt="Print and Cut">
                <h3>Print and Cut Machine</h3>
                <p>A large-format printer with a built-in cutter, ideal for creating stickers, decals, signage, and custom graphics with precision.</p>
                <button class="book-facility" data-facility="Print and Cut">Book Now</button>
            </div>

        </section>

<<<<<<< HEAD
        <!-- Popup Modal -->
<!-- Facilities Booking Modal -->
<div id="facilitiesModal" class="facilities-modal">
    <div class="facilities-modal-content">
        <span class="close-facilities-modal">&times;</span>
        <h2>Book a Facility</h2>
        <p>Fill out the form to reserve a facility.</p>
        <form>
            
            <label for="facilitiesDate" class="facdate">Select Date:</label>
            <input type="date" id="facilitiesDate" required>
=======
                <!-- Popup Modal -->
        <!-- Facilities Booking Modal -->
        <div id="facilitiesModal" class="facilities-modal">
            <div class="facilities-modal-content">
                <span class="close-facilities-modal">&times;</span>
                <h2>Book a Facility</h2>
                <p>Fill out the form to reserve a facility.</p>
                <form>
                    
                    <label for="facilitiesDate">Select Date:</label>
                    <input type="date" id="facilitiesDate" required>
>>>>>>> machinelist

                    <label for="facilitiesTime">Select Time Slot(s):</label>
                    <div id="facilitiesTime" class="time-slot-container">
                        <!-- Time slots will be generated here by JavaScript -->
                    </div>

<<<<<<< HEAD
            <label for="facilitiesSelect" class="facilities-label">Machine:</label>
            <label id="facilitiesSelect" class="facilities-value">
                <!-- Facilities will be added dynamically -->
</label>
            
=======
                    <label for="facilitiesSelect">Select Facility:</label>
                    <select id="facilitiesSelect">
                        <!-- Facilities will be added dynamically -->
                    </select>
                    
>>>>>>> machinelist

                    <button type="submit">Confirm Booking</button>
                </form>
            </div>
        </div>

         <div id="successModal" class="modal" style="display:none; align-items:center; justify-content:center; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.5);">
            <div style="background:white; padding:60px; border-radius:8px; text-align:center;">
                <h4>Booking Successful!</h4>
                <p>Your facility has been booked.</p>
                <button id="closeSuccess" class="btn btn-success mt-3">Done</button>


            </div>
        </div>

    </main>

    @include('NavBars.botbar')

<!-- Link to External JavaScript File -->
<script src="js/booking-popup.js"></script>
<script src="{{ asset('js/sidepanel.js') }}"></script>

</body>
</html>

