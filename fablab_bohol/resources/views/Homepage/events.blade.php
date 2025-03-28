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
    <!-- Events Page Content -->
    <main>

    <div class="eventsmain-container">
        <div class="eventsmain-content">
            <h1>UNLEASH YOUR<br>CREATIVITY<br>AT FABLAB</h1>
        </div>
            <img src="{{ asset('images/eventshead.jpg') }}" alt="Event Image" class="event-image">
    </div>

<div class="events-header">
    <h3>Upcoming Events</h3>
</div>
<section class="search-filter">
    <div class="search-container">
        <input type="text" placeholder="Search Events">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="search-icon">
            <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zM9.5 14C7 14 5 12 5 9.5S7 5 9.5 5 14 7 14 9.5 12 14 9.5 14z"/>
        </svg>
    </div>
</section>


<section class="eventsmain">
    <div class="eventsmain-row">
        <div class="event-box">
            <img src="{{ asset('images/event1.jpg') }}" alt="Event Image 1">
            <hr>
            <h3>Chocolate Mold Making</h3>
            <h4> Date: April 13, 2024</h4>
            <button onclick="window.location.href='{{ route('login') }}'">Sign Up</button>
        </div>
        <div class="event-box">
            <img src="{{ asset('images/event2.jpg') }}" alt="Event Image 2">
            <hr>
            <h3>3D Animation</h3>
            <h4> Date: April 9, 2024</h4>
            <button onclick="window.location.href='{{ route('login') }}'">Sign Up</button>
        </div>
        <div class="event-box">
            <img src="{{ asset('images/event3.jpg') }}" alt="Event Image 3">
            <hr>
            <h3>The Makers Challenge</h3>
            <h4> Date: February 20, 2024</h4>   
            <button onclick="window.location.href='{{ route('login') }}'">Sign Up</button>
        </div>
        <div class="event-box">
            <img src="{{ asset('images/event3.jpg') }}" alt="Event Image 3">
            <hr>
            <h3>The Makers Challenge</h3>
            <h4> Date: April 20, 2024</h4>
            <button onclick="window.location.href='{{ route('login') }}'">Sign Up</button>
        </div>
        <div class="event-box">
            <img src="{{ asset('images/event3.jpg') }}" alt="Event Image 3">
            <hr>
            <h3>The Makers Challenge</h3>
            <h4> Date: April 20, 2024</h4>
            <button onclick="window.location.href='{{ route('login') }}'">Sign Up</button>
        </div>
        <div class="event-box">
            <img src="{{ asset('images/event3.jpg') }}" alt="Event Image 3">
            <hr>
            <h3>The Makers Challenge</h3>
            <h4> Date: June 20, 2024</h4>
            <button onclick="window.location.href='{{ route('login') }}'">Sign Up</button>
        </div>
    </div>
</section>

<section class="eventsbottom-container">
    <!-- Left Side: Image -->
    <div class="eventsbottom-image">
        <img src="{{ asset('images/eventsbottomkids.jpg') }}" alt="Kids at Work">
    </div>

    <!-- Right Side: Text (SVG) -->
    <div class="eventsbottom-text">
        <svg width="800" height="400" viewBox="0 0 800 400" xmlns="http://www.w3.org/2000/svg">
            <style>
                .eventsbottom-text-svg { 
                    font-family: 'Arial', sans-serif; 
                    fill: #002f6c; 
                    font-weight: bold; 
                    font-size: 80px; 
                    letter-spacing: 2px;
                }
                .eventsbottom-quote-svg { 
                    font-family: 'Arial', sans-serif; 
                    fill: #666; 
                    font-size: 20px; 
                    font-style: italic;
                }
                .eventsbottom-highlight-svg { 
                    font-weight: bold; 
                    font-size: 80px;
                }
            </style>

            <!-- "WHERE" with its quote aligned to the right -->
            <text x="50" y="80" class="eventsbottom-text-svg">WHERE</text>
            <text x="665" y="50" class="eventsbottom-quote-svg" text-anchor="end">"Join us at FabLab, where</text>
            <text x="690" y="70" class="eventsbottom-quote-svg" text-anchor="end">imagination meets technology."</text>

            <!-- "IDEAS BECOME" properly aligned -->
            <text x="60" y="160" class="eventsbottom-text-svg">IDEAS BECOME</text>

            <!-- "REALITY" moved to the right with its quote below it -->
            <text x="700" y="240" class="eventsbottom-text-svg eventsbottom-highlight-svg" text-anchor="end">REALITY</text>
            <text x="50" y="210" class="eventsbottom-quote-svg">"Transform your ideas into reality</text>
            <text x="50" y="230" class="eventsbottom-quote-svg">with the power of innovation."</text>
        </svg>
    </div>
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

<script src="{{ asset('js/search-events.js') }}"></script>

<script src="{{ asset('js/sidepanel.js') }}"></script>
</body>
</html>
