        <!-- ✅ Side Panel -->
        <div id="mySidepanel" class="sidepanel">
        <button href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</button>
            <a href="{{ route('profile') }}">
            <img src="../images/logoprofile.png" class="side-icon" alt= "Profile">My Profile</a>
            <a href="{{ route('profilebooking') }}">
                <img src="../images/logobooking.png" class="side-icon" alt= "Bookings">Bookings</a>
            <a href="{{ route('profileevents') }}">
                <img src="../images/logoevent.png" class="side-icon" alt= "Events">Events</a>
            <a href="{{ route('adprofile') }}">
            <img src="../images/logoprofile.png" class="side-icon" alt= "Profile">Admin Profile</a>
            <a href="{{ route('machines') }}">
                <img src="../images/logomachine.png" class="side-icon" alt= "Machines">Machines</a>
            <a href="{{ route('addevents') }}">
                <img src="../images/logoevent.png" class="side-icon" alt= "Events">Events</a>
            <a href="{{ route('addnews') }}">
                <img src="../images/logonewsletter.png" class="side-icon" alt= "Newsletters">Newsletters</a>
            <a href="{{ route('reports') }}">
                <img src="../images/logoreport.png" class="side-icon" alt= "Reports">Reports</a>
            <a href="{{ route('home') }}">
                <img src="../images/logologout.png" class="side-icon" alt= "Logout">Logout</a>
        </div>

        <!-- ✅ Burger Button -->
        <button onclick="openNav()">☰</button>

    </nav>