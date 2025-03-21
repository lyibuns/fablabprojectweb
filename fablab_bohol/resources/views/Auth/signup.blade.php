<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FABLAB Bohol - Sign Up</title>

    <base href="{{ url('/') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">
    <link rel="stylesheet" href="../css/style.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="description" content="Sign up for FABLAB Bohol and join our community.">
    <meta name="keywords" content="FABLAB, Sign Up, Bohol, BISU, Digital Fabrication">

    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/10.0.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.0.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.0.0/firebase-firestore.js"></script>

    <script type="module" src="{{ asset('js/firebase-essentials/createaccount.js') }}"></script>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                
                <!-- Logo and Branding -->
                <div class="text-center mb-3">
                    <img src="{{ asset('images/icon.png') }}" alt="FABLAB Logo" class="img-fluid" style="max-width: 100px;">

                    <!-- FABLAB BOHOL Text -->
                    <h3 class=" fw-bold text-dark">FABLAB BOHOL</h3>

                    <!-- Tagline -->
                    <p class="text-muted mb-4">Design  •  Create  •  Inspire</p>
                </div>


                <!-- Sign-Up Card -->
                <div class="card shadow p-4">
                    <h2 class="text-center mb-3">Create an Account</h2>

                    <form method="POST" action="{{ route('signup') }}">
                        @csrf

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" required placeholder="Enter your full name">
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <label for="gender" class="form-label">Disaggregation</label>
                            <select id="gender" name="gender" class="form-select" required>
                                <option value="" disabled selected>Select an option</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="lgbtq">LGBTQ+</option>
                                <option value="youth">Youth</option>
                                <option value="senior">Senior Citizen</option>
                                <option value="pwd">PWD</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">User Category</label>
                            <select id="gender" name="gender" class="form-select" required>
                                <option value="" disabled selected>Select an option</option>
                                <option value="academe">Academe</option>
                                <option value="startup">Start-up/Individual</option>
                                <option value="msme">Micro Small Medium Enterprises</option>
                                <option value="govoffice">Government Office/NGO/Org</option>
                        
                            </select>
                        </div>

                        <!-- Contact Number -->
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact Number</label>
                            <input type="tel" id="contact" name="contact" class="form-control" required 
                                   placeholder="Enter your contact number" pattern="[0-9]{10,15}"
                                   title="Enter a valid phone number (10-15 digits)">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required placeholder="Enter your email">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required minlength="8" placeholder="Create a password">
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" id="confirm-password" name="confirm_password" class="form-control" required minlength="8" placeholder="Confirm your password">
                        </div>

                        <!-- Sign Up Button (Custom Color) -->
                        <button type="submit" class="btn btn-custom w-100">Sign Up</button>
                    </form>

                    <!-- Login Link -->
                    <p class="text-center mt-3">
                        Already have an account? <a href="{{ route('login') }}" class="text-decoration-underline">Log In</a>
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
