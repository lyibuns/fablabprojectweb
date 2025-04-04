
<!DOCTYPE html>
<html>
<head>
@include('NavBars.head')

</head>

<body>
@yield('content')
 <!--Navigation Bar -->   
 @include('NavBars.navbar')
 
 @include('NavBars.sidebar')

    
    
<div class="hero-slideshow-container">

<!-- Slide 1 -->
<div class="hero-slide">
    <img src="{{ asset('images/s1.jpg') }}" alt="Slide 1">
    <div class="hero-caption">
        <h1>Create almost anything.</h1>
        <p>Sign Up to our upcoming events.</p>
        <button onclick="window.location.href='{{ route('events') }}'">Sign Up</button>
    </div>
</div>

<!-- Slide 2 -->
<div class="hero-slide">
    <img src="{{ asset('images/s2.png') }}" alt="Slide 2">
    <div class="hero-captionblue">
        <h1>Read the <br> latest news.</h1>
        <p>Take a look at what we can do.</p>
        <button onclick="window.location.href='{{ route('news') }}'">Read More</button>
    </div>
</div>

<!-- Slide 3 -->
<div class="hero-slide">
    <img src="{{ asset('images/s3.png') }}" alt="Slide 3">
    <div class="hero-caption">
        <h1>Unleash your<br>creativity</h1>
        <p>Use our machinery to make your designs come to life.</p>
        <button onclick="window.location.href='{{ route('facilities') }}'">Book Now</button>
    </div>
</div>

<!-- Slide 4 -->
<div class="hero-slide">
    <img src="{{ asset('images/s4.png') }}" alt="Slide 3">
    <div class="hero-captionblue">
        <h1>Get to know us.</h1>
        <p>Join our community and bring your ideas to life.</p>
        <button onclick="window.location.href='{{ route('aboutus') }}'">More Info</button>
    </div>
</div>

<!-- Slide 5 -->
<div class="hero-slide">
    <img src="{{ asset('images/s5.png') }}" alt="Slide 3">
    <div class="hero-caption">
        <h1>Come visit us today!</h1>
        <p>A place where designers meet. </p>
        <button onclick="window.location.href='{{ route('location') }}'">Location</button>
    </div>
</div>

<!-- Navigation Dots -->
<div class="hero-nav">
    <span class="hero-nav-btn" onclick="heroCurrentSlide(1)"></span>
    <span class="hero-nav-btn" onclick="heroCurrentSlide(2)"></span>
    <span class="hero-nav-btn" onclick="heroCurrentSlide(3)"></span>
    <span class="hero-nav-btn" onclick="heroCurrentSlide(4)"></span>
    <span class="hero-nav-btn" onclick="heroCurrentSlide(5)"></span>
</div>



    <section class="welcome">
    <h2> WELCOME TO FABLAB </h2>
    <p class="welcome">FABLAB Bohol Philippines is the first Fabrication Laboratory in the Philippines.<br>
        It is a collaboration project between four government agency we have the Department of Trade <br>
        and Industry, Bohol Island State University, Department of Science and Technology and Japan<br>
        International Cooperating Agency.
    </p>
    <button onclick="location.href='{{ route('aboutus') }}'">Learn More</button>

    </section>

    <section class="newsletterhome">
        <div class="left-section">
        <h1>2024 Magazine</h1>
        <iframe src="C:\Users\USER\Desktop\fablab-web\fablab web\newsletter\example.pdf#toolbar=0" width="600" height="700"></iframe><br>
        <a href="../newsletter/example.pdf" download="example.pdf">
        <button onclick>DOWNLOAD</button>
        </a>
    </div>
    <div class="right-section">
        <div class="hnewsletter-card1">
            <div class="thumbnail"></div>
            <div class="text-content">
                <h2>December 2024</h2>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit,”</p>
                <button class="read-more" onclick="location.href='{{ route('news') }}'">Read more</button>
            </div>
        </div>
        <div class="hnewsletter-card">
            <div class="thumbnail"></div>
            <div class="text-content">
                <h2>November 2024</h2>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit,”</p>
                <button class="read-more" onclick="location.href='{{ route('news') }}'">Read more</button>
            </div>
        </div>
        <div class="newsletter-card">
            <div class="thumbnail"></div>
            <div class="text-content">
                <h2>October 2024</h2>
                <button class="read-more" onclick="location.href='{{ route('news') }}'">Read more</button>
            </div>
        </div>
    </div>
    </section>

    <section class="eventshome">
         <h1>Upcoming Events</h1>
         <div class=events-container>
         <div class="event1">
         <img src="{{ asset('images/event1.jpg') }}" alt= "Event Image 1">
         <hr>
         <h3>Chocolate Mold Making</h3>
         <button>Sign Up</button>
        </div>
         <div class="event2">
         <img src="{{ asset('images/event2.jpg') }}" alt= "Event Image 1">
         <hr>
         <h3>3D Animation</h3>
         <button>Sign Up</button>
         </div>
         <div class="event3">
         <img src="{{ asset('images/event3.jpg') }}"alt= "Event Image 1">
         <hr>
         <h3>The Makers Challenge</h3>
         <button>Sign Up</button>
         </div>
</div>
    </section>

    <section class="facilitieshome">
        <h1>FABLAB Bohol Facilities</h1>
        <hr>
    <div class="machines-container">
    <div class="machinebox">
        <img src="../images/maccnc.png" alt="CNC Milling Machine">
        <h4>CNC Milling Machine</h4>
    </div>
    <div class="machinebox">
        <img src="../images/macronald.png" alt="Roland Print and Cut Machine">
        <h4>Roland Print and Cut Machine</h4>
    </div>
    <div class="machinebox">
        <img src="../images/mac3d.png" alt="3D Printer">
        <h4>3D Printer</h4>
    </div>
    <div class="machinebox">
        <img src="../images/macemb.png" alt="Digital Embroidery Machine">
        <h4>Digital Embroidery Machine</h4>
    </div>
    <div class="machinebox">
        <img src="../images/macvinyl.png" alt="Vinyl Cutter">
        <h4>Vinyl Cutter</h4>
    </div>
    <div class="machinebox">
        <img src="../images/macscan.png" alt="3D Scanner">
        <h4>3D Scanner</h4>
        </div>
    <div class="machinebox">
        <img src="../images/maclaser.png" alt="Laser Cutter">
        <h4>Laser Cutter</h4>
        </div>
    <div class="machinebox">
        <img src="../images/macvaq.png" alt="Vaquform">
        <h4>Vaquform</h4>
        </div>

    </section>
    
    <section class="jmakershome">
        <img class ="jmakerspic" src="../images/jmakers.png" alt="JMAKERS">
        <h3>Learn and manage digital fabrication tools with JMAKERS.<br>
            Download our App today!</h3>
        <button onclick="location.href='https://play.google.com/store/apps/details?id=com.fablabbohol.jmakers&pcampaignid=web_share'">Get App</button>
    </section>

    <section class="locationhome">
        <img src="../images/locback.jpg">
        <h1> Where to Find Us </h1>
        <!-- Google Map Embed -->
        <div class="locgoogle">
        <div style="width: 100%; height: 450px;">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d983.764705612746!2d123.84987406953452!3d9.659918165708865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aa4fb252bd4e4d%3A0x8535a6b7b68e2029!2sFABLAB%20Bohol!5e0!3m2!1sen!2sph!4v1711338917723!5m2!1sen!2sph"
        width="100%"
        height="100%"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>


        <button class="read-more" onclick="location.href='https://maps.app.goo.gl/9Tp4Gn1TP9AAF6vs8'">Location</button>
        </div>
    </section>


    @include('NavBars.botbar')
    
    <!-- ✅ Full-Screen Dark Overlay -->
    <div id="overlay" class="overlay" onclick="closeNav()"></div>

    <script src="{{ asset('js/sidepanel.js') }}"></script>
</body>
</html>