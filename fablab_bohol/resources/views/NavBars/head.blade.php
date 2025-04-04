<head>
    <title>@yield('title', 'FABLAB Bohol - Profile')</title>
    <base href="{{ url('/') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">

    <!-- Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'FABLAB Bohol')">
    <meta name="keywords" content="FABLAB, Fabrication, Laboratory, Bohol, Bohol Island State University">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Stylesheets: Bootstrap FIRST, Your custom style LAST -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- ✅ Place last to override Bootstrap -->

    <!-- Firebase SDKs -->
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore-compat.js"></script>

    <!-- Firebase Project Scripts -->
    <script defer src="{{ asset('js/firebase-essentials/firebase-init.js') }}"></script>
    <script defer src="{{ asset('js/firebase-essentials/firebase-auth.js') }}"></script>

    <!-- JavaScript Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>

    <!-- Your Custom Scripts -->
    <script defer src="{{ asset('js/hero-slideshow.js') }}"></script>
    <script defer src="{{ asset('js/sidepanel.js') }}"></script>
    <script defer src="{{ asset('js/login/login-Logout.js') }}"></script>
    <script defer src="{{ asset('js/booking-popup.js') }}"></script>
</head>
