<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FABLAB Bohol - Location</title>
    
    <!-- ✅ Ensure base URL is set -->
    <base href="{{ url('/') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <meta name="description" content="Find FABLAB Bohol's location, directions, and contact details.">
    <meta name="keywords" content="FABLAB, Location, Map, Bohol, BISU, Digital Fabrication, Contact Us">

   
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        
      
    <div class="logo"><a href= "{{ route('home') }}"><img src="../images/fablab-logo.png" alt="Home" width="100" height=""></a></div>
        
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('news') }}">Newsletter</a></li>
            <li><a href="{{ route('events') }}">Events</a></li>
            <li><a href="{{ route('facilities') }}">Facilities</a></li>
            <li><a href="{{ route('aboutus') }}">About Us</a></li>
            <li><a href="{{ route('location') }}" class="active">Location</a></li>
        </ul>
        <button onclick="window.location.href='{{ route('login') }}'"> Log In </button>
    </nav>

    <!-- Location Page Content -->
    <main class="container">
        <!-- "Find Us" Section -->
        <section class="location-info">
            <h1>Find Us</h1>
            <p><strong>FABLAB Bohol</strong> is located at <strong>Bohol Island State University (BISU) Main Campus, CPG Avenue, Tagbilaran City, Bohol.</strong></p>
            <p>We welcome students, researchers, and businesses to explore our digital fabrication facilities, develop prototypes, and learn cutting-edge technology.</p>
        </section>

        <!-- Google Map Embed -->
        <div class="map-container">
        <!--MAIN -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3933.3995533368025!2d123.85285891137524!3d9.646859778970173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aa4db308799553%3A0xc61c21092087f823!2sFablab%20Bohol%20Philippines!5e0!3m2!1sen!2sus!4v1741937361477!5m2!1sen!2sus"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </iframe>
        <!--CANDIJAY -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3931.18207770951!2d124.5266331113766!3d9.835070075808737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3300a78d0fa753cf%3A0xddc715efd96443b9!2sDigiFab%20Center%20-Bisu%20Candijay%20Campus!5e0!3m2!1sen!2sus!4v1741937434543!5m2!1sen!2sus"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <!--CALAPE -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d471.7751657371775!2d123.88221309063088!3d9.894499867791724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aa323cb7aaaaab%3A0x856d8bc7852b9a9c!2sBohol%20Island%20State%20University%20Calape%20Campus!5e0!3m2!1sen!2sus!4v1741937547323!5m2!1sen!2sus"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Directions Section -->
        <section class="directions">
            <h2>How to Get Here</h2>
            <ul>
                <li>🚖 <strong>By Car:</strong> Use Google Maps and search for "Bohol Island State University". Follow the navigation directions.</li>
                <li>🚌 <strong>By Public Transport:</strong> Take a tricycle or jeepney to <strong>CPG Avenue</strong> and ask for the BISU Main Campus.</li>
                <li>✈ <strong>From the Airport:</strong> Tagbilaran Airport is only a <strong>10-minute</strong> drive from FABLAB Bohol.</li>
            </ul>
        </section>

        <!-- Contact Information -->
        <section class="contact-info">
            <h2>Contact Us</h2>
            <p>📍 <strong>Address:</strong> BISU Main Campus, CPG Avenue, Tagbilaran City, Bohol</p>
            <p>📞 <strong>Phone:</strong> 411-3147</p>
            <p>📧 <strong>Email:</strong> <a href="mailto:fablabbhl@gmail.com">fablabbhl@gmail.com</a></p>
        </section>
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

</body>
</html>
