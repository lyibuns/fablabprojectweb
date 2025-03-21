<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FABLAB Bohol - Log In</title>

    <base href="{{ url('/') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <meta name="description" content="Find FABLAB Bohol's location, directions, and contact details.">
    <meta name="keywords" content="FABLAB, Location, Map, Bohol, BISU, Digital Fabrication, Contact Us">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ✅ Load Firebase SDKs (BEFORE firebase-init.js & firebase-auth.js) -->
<script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore-compat.js"></script>

<!-- ✅ Ensure Firebase Initialization and Authentication Scripts Load After Firebase SDK -->
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

                    <!-- Password Input -->
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required minlength="8" placeholder="Enter your password">

                    <!-- Forgot Password -->
                    <a href="#" class="forgot-password">Forgot password?</a>
    
                    <!-- Login Button -->
                    <button type="submit" class="login-button">Log In</button>
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

   <!-- ✅ Ensure `signInWithGoogle` is Available Before Running Inline Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        console.log("🔄 Checking if signInWithGoogle is defined:", typeof window.signInWithGoogle);

        const googleLoginBtn = document.getElementById("googleSignInBtn");
        if (googleLoginBtn) {
            googleLoginBtn.addEventListener("click", function (event) {
                event.preventDefault();
                console.log("🔄 Google Sign-In Button Clicked");

                if (typeof window.signInWithGoogle === "function") {
                    signInWithGoogle();
                } else {
                    console.error("❌ signInWithGoogle function is not defined. Ensure firebase-auth.js is loaded correctly.");
                }
            });
        } else {
            console.error("❌ Google Sign-In Button not found.");
        }
    });
</script>


</body>
</html>
