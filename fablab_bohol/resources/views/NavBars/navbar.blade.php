<nav class="navbar">
    <div class="logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/fablab-logo.png') }}" alt="Home" width="100">
        </a>
    </div>

    <ul>
        <li><a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('news') }}" class="{{ Route::is('news') ? 'active' : '' }}">Newsletter</a></li>
        <li><a href="{{ route('events') }}" class="{{ Route::is('events') ? 'active' : '' }}">Events</a></li>
        <li><a href="{{ route('facilities') }}" class="{{ Route::is('facilities') ? 'active' : '' }}">Facilities</a></li>
        <li><a href="{{ route('aboutus') }}" class="{{ Route::is('aboutus') ? 'active' : '' }}">About Us</a></li>
        <li><a href="{{ route('location') }}" class="{{ Route::is('location') ? 'active' : '' }}">Location</a></li>
    </ul>

    <!-- Log In / Burger logic will be toggled by Firebase JS -->
    <button id="login-btn" onclick="handleLoginRedirect()">Log In</button>
    <button id="burger-btn" onclick="openNav()" style="display: none;">☰</button>
</nav>
