<head>
    <title>@yield('title', 'FABLAB Bohol')</title>

    <!-- ✅ Ensure base URL is set -->
    <base href="{{ url('/') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <meta name="description" content="@yield('meta_description', 'FABLAB Bohol')">
    <meta name="keywords" content="FABLAB, Fabrication, Laboratory, Bohol, Bohol Island State University">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Optional Refresh -->
    {{-- <meta http-equiv="refresh" content="5"> --}}

    <!-- JS: Hero Slideshow -->
    <script src="{{ asset('js/hero-slideshow.js') }}" defer></script>

    <!-- Firebase SDKs -->
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore-compat.js"></script>

    <!-- Firebase Project Scripts -->
    <script defer src="{{ asset('js/firebase-essentials/firebase-init.js') }}"></script>
    <script defer src="{{ asset('js/firebase-essentials/firebase-auth.js') }}"></script>
    <script defer src="{{ asset('js/login/login-Logout.js') }}"></script>
    <script defer src="{{ asset('js/sidepanel.js') }}"></script>
    @stack('head')
</head> 
