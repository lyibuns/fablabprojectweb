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
</head>

<body>


 <!--Navigation Bar -->   
 <nav class="innavbar">
    <div class="logo">
        <a href="{{ route('home') }}">
            <img src="../images/fablab-logo.png" alt="Home" width="100">
        </a>
    </div>
    <ul class="nav-links">
        <li><a href="{{ route('home') }}" class="active">Home</a></li>
        <li><a href="{{ route('news') }}">Newsletter</a></li>
        <li><a href="{{ route('events') }}">Events</a></li>
        <li><a href="{{ route('facilities') }}">Facilities</a></li>
        <li><a href="{{ route('aboutus') }}">About Us</a></li>
        <li><a href="{{ route('location') }}">Location</a></li>
    </ul>

<!-- Side Panel -->
<div id="mySidepanel" class="sidepanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="{{ route('profilebooking') }}">Bookings</a>
    <a href="{{ route('profileevents') }}">Events</a>
    <a href="{{ route('profile') }}">Profile</a>
</div>

<!-- Burger Button -->
<button  onclick="openNav()">☰</button>


<script src="{{ asset('js/sidepanel.js') }}"></script>

</nav>

</body>
</html>