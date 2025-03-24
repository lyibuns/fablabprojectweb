<!DOCTYPE html>
<html>
<head>
    <title>FABLAB Bohol - Home</title>

    <!-- ✅ Ensure base URL is set -->
    <base href="{{ url('/') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="description" content="FABLAB Bohol">
    <meta name="keywords" content="FABLAB, Fabrication, Laboratory, Bohol, Bohol Island State University">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!--<meta http-equiv="refresh" content="5"> -->
    <script src="{{ asset('js/hero-slideshow.js') }}" defer></script>

    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore-compat.js"></script>

    <!-- ✅ Ensure Firebase Initialization and Authentication Scripts Load After Firebase SDK -->
    <script defer src="{{ asset('js/firebase-essentials/firebase-init.js') }}"></script>
    <script defer src="{{ asset('js/firebase-essentials/firebase-auth.js') }}"></script>

    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js'></script>

</head>

<body>

    <!-- ✅ Navigation Bar -->
    <nav class="innavbar">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="../images/fablab-logo.png" alt="Home" width="100">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('news') }}">Newsletter</a></li>
            <li><a href="{{ route('events') }}">Events</a></li>
            <li><a href="{{ route('facilities') }}">Facilities</a></li>
            <li><a href="{{ route('aboutus') }}">About Us</a></li>
            <li><a href="{{ route('location') }}">Location</a></li>
        </ul>

        <!-- ✅ Side Panel -->
        <div id="mySidepanel" class="sidepanel">
        <button href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</button>
            <a href="{{ route('profilebooking') }}">
                <img src="../images/logobooking.png" class="side-icon" alt= "Bookings">Bookings</a>
            <a href="{{ route('profileevents') }}">
                <img src="../images/logoevent.png" class="side-icon" alt= "Events">Events</a>
            <a href="{{ route('profile') }}">
                <img src="../images/logoprofile.png" class="side-icon" alt= "Profile">My Profile</a>
            <a href="{{ route('home') }}">
                <img src="../images/logologout.png" class="side-icon" alt= "Logout">Logout</a>
        </div>

        <!-- ✅ Burger Button -->
        <button onclick="openNav()">☰</button>

    </nav>

    <div class="current">
        <h1>Current</h1>
        <h2>Book a machine</h2>
    </div>

    <div class="schedules">
        <h1>Upcoming Schedule</h1>
        <div id="calendar"></div>
    </div>

    
    <!-- ✅ Full-Screen Dark Overlay -->
    <div id="overlay" class="overlay" onclick="closeNav()"></div>

    <script src="/js/profile/calendar.js" defer></script>
    <script src="{{ asset('js/sidepanel.js') }}"></script>
</body>

</html>