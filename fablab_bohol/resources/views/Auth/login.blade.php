<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FABLAB Bohol - Log In</title>

    <base href="{{ url('/') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- 🔽 Bootstrap CSS (Optional: for better UI) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- 🔽 Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <meta name="description" content="Find FABLAB Bohol's location, directions, and contact details.">
    <meta name="keywords" content="FABLAB, Location, Map, Bohol, BISU, Digital Fabrication, Contact Us">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ✅ Firebase SDKs -->
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore-compat.js"></script>

    <!-- ✅ Firebase Init -->
    <script defer src="{{ asset('js/firebase-essentials/firebase-init.js') }}"></script>
    <script defer src="{{ asset('js/firebase-essentials/firebase-auth.js') }}"></script>
</head>
<body>

    <nav class="navbar">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/fablab-logo.png') }}" alt="Home" width="100">
            </a>
        </div>
        
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('news') }}">Newsletter</a></li>
            <li><a href="{{ route('events') }}">Events</a></li>
            <li><a href="{{ route('facilities') }}">Facilities</a></li>
            <li><a href="{{ route('aboutus') }}">About Us</a></li>
            <li><a href="{{ route('location') }}">Location</a></li>
        </ul>
        <button onclick="window.location.href='{{ route('login') }}'"> Log In </button>
    </nav>

    <main class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="login-wrapper">
            <section class="login-container">
        
                <!-- Logo -->
                <div class="login-logo">
                    <img src="{{ asset('images/icon.png') }}" alt="FABLAB Logo">
                </div>

                <!-- Login Form -->
                <form method="POST" class="login-form">
                    @csrf

                    <!-- Email Input -->
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">

                    <!-- Password Input with toggle -->
                    <label for="password">Password</label>
                    <div class="position-relative">
                        <input type="password" id="password" name="password" required minlength="8" placeholder="Enter your password" class="form-control pe-5">
                        <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3" id="togglePassword" style="cursor: pointer;"></i>
                    </div>

                    <!-- Forgot Password -->
                    <a href="#" class="forgot-password">Forgot password?</a>

                    <!-- Login Button -->
                    <button type="submit" class="login-button">Log In</button>
                    <p id="login-status" class="text-danger text-center mt-2"></p>
                </form>

                <!-- OR Separator -->
                <div class="separator">
                    <hr class="line">
                    <span>or</span>
                    <hr class="line">
                </div>

                <!-- Google Login -->
                <a href="javascript:void(0);" class="google-login" id="googleSignInBtn">
                    <img src="{{ asset('images/googlelogo.png') }}" alt="Google Logo"> Continue with Google
                </a>

                <!-- Sign Up Link -->
                <p class="signup-text">
                    Don't have an account yet? <a href="{{ route('signup') }}">Sign Up</a>
                </p>
            </section>
        </div>
    </main>

    <!-- Show/Hide Password Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const togglePassword = document.getElementById("togglePassword");
            const passwordInput = document.getElementById("password");

            togglePassword.addEventListener("click", function () {
                const isPassword = passwordInput.getAttribute("type") === "password";
                passwordInput.setAttribute("type", isPassword ? "text" : "password");
                togglePassword.classList.toggle("bi-eye");
                togglePassword.classList.toggle("bi-eye-slash");
            });
        });
    </script>

</body>
</html>
