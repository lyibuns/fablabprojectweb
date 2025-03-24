
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