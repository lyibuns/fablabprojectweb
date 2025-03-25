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
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore-compat.js"></script>

    <script src="{{ asset('js/firebase-essentials/firebase-init.js') }}"></script>
    <script type="module" src="{{ asset('js/firebase-essentials/firebase-createaccount.js') }}"></script>
</head>
<body class="bg-light">

    <div class="d-flex justify-content-center align-items-center min-vh-100 px-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">

                    <!-- Logo and Branding -->
                    <div class="text-center mb-3">
                        <img src="{{ asset('images/icon.png') }}" alt="FABLAB Logo" class="img-fluid" style="max-width: 100px;">
                        <h3 class="fw-bold text-dark">FABLAB BOHOL</h3>
                        <p class="text-muted mb-4">Design  •  Create  •  Inspire</p>
                    </div>

                    <!-- Sign-Up Card -->
                    <div class="card shadow p-4">
                        <h2 class="text-center mb-3">Create an Account</h2>

                        <form id="signup-form" method="POST">
                            @csrf

                            <!-- Full Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" id="name" name="name" class="form-control" required placeholder="Enter your full name">
                            </div>

                            <!-- Gender -->
                            <div class="mb-3">
                                <label for="disaggregation" class="form-label">Disaggregation</label>
                                <select id="disaggregation" name="disaggregation" class="form-select" required>
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
                                <label for="category" class="form-label">User Category</label>
                                <select id="category" name="category" class="form-select" required>
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
                            <button type="submit" class="btn btn-custom w-100 text-white">Sign Up</button>
                        </form>

                         <!-- Terms Checkbox BELOW the button -->
                        <div class="form-check d-flex align-items-center gap-2 justify-content-center mb-4">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                <small>
                                    I agree to 
                                    <a href="#" class="text-primary text-decoration-none">Terms of Use</a> and 
                                    <a href="#" class="text-primary text-decoration-none">Privacy Policy</a>.
                                </small>
                            </label>
                        </div>


                        <p id="status-message" class="text-danger text-center mt-3"></p>
                        <p class="text-center mt-3">
                            Already have an account? <a href="{{ route('login') }}" class="text-decoration-underline">Log In</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    document.getElementById('signup-form').addEventListener('submit', function (e) {
        const termsCheckbox = document.getElementById('terms');
        const statusMessage = document.getElementById('status-message');

        if (!termsCheckbox.checked) {
            e.preventDefault(); // Stop form submission
            statusMessage.textContent = "You must agree to the Terms of Use and Privacy Policy before signing up.";
        } else {
            statusMessage.textContent = ""; // Clear any previous error
        }
    });
</script>
</body>
</html>
