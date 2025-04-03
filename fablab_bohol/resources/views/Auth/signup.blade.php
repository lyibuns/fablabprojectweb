<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FABLAB Bohol - Sign Up</title>

  <base href="{{ url('/') }}">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon.png') }}" />
  <link rel="stylesheet" href="../css/style.css" />

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>

  <!-- Firebase SDK -->
  <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore-compat.js"></script>

  <script src="{{ asset('js/firebase-essentials/firebase-init.js') }}"></script>
  <script type="module" src="{{ asset('js/firebase-essentials/firebase-createaccount.js') }}"></script>

  <style>
    .form-text.validation-feedback {
      display: none;
      transition: opacity 0.3s ease-in-out;
    }
    .form-text.validation-feedback.visible {
      display: block;
      opacity: 1;
    }
    .progress-bar {
      transition: width 0.4s ease-in-out;
    }
  </style>
</head>
<body class="bg-light">

<div class="d-flex justify-content-center align-items-center min-vh-100 px-3">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">

        <!-- Logo -->
        <div class="text-center mb-3">
          <img src="{{ asset('images/icon.png') }}" alt="FABLAB Logo" class="img-fluid" style="max-width: 100px;">
          <h3 class="fw-bold text-dark">FABLAB BOHOL</h3>
          <p class="text-muted mb-4">Design  •  Create  •  Inspire</p>
        </div>

        <!-- Card -->
        <div class="card shadow p-4">
          <h2 class="text-center mb-3">Create an Account</h2>

          <form id="signup-form" method="POST" novalidate>
            @csrf

            <!-- Last Name -->
            <div class="mb-3">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" id="last_name" name="last_name" class="form-control" required>
              <small class="form-text validation-feedback text-danger" id="lastNameFeedback">Last name is required.</small>
            </div>

            <!-- First Name -->
            <div class="mb-3">
              <label for="first_name" class="form-label">First Name</label>
              <input type="text" id="first_name" name="first_name" class="form-control" required>
              <small class="form-text validation-feedback text-danger" id="firstNameFeedback">First name is required.</small>
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
              <small class="form-text validation-feedback text-danger" id="disaggregationFeedback">Please select a category.</small>
            </div>

            <!-- Category -->
            <div class="mb-3">
              <label for="category" class="form-label">User Category</label>
              <select id="category" name="category" class="form-select" required>
                <option value="" disabled selected>Select an option</option>
                <option value="academe">Academe</option>
                <option value="startup">Start-up/Individual</option>
                <option value="msme">Micro Small Medium Enterprises</option>
                <option value="govoffice">Government Office/NGO/Org</option>
              </select>
              <small class="form-text validation-feedback text-danger" id="categoryFeedback">Please choose a user category.</small>
            </div>

            <!-- Contact -->
            <div class="mb-3">
              <label for="contact" class="form-label">Contact Number</label>
              <input type="tel" id="contact" name="contact" class="form-control" required pattern="[0-9]{10,15}">
              <small class="form-text validation-feedback text-danger" id="contactFeedback">Enter a valid 10–15 digit phone number.</small>
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control" required>
              <small class="form-text validation-feedback text-danger" id="emailFeedback">Enter a valid email address.</small>
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <input type="password" id="password" name="password" class="form-control" required minlength="8">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                  <i class="bi bi-eye"></i>
                </button>
              </div>

              <!-- Strength -->
              <div class="mt-2">
                <div class="progress" style="height: 6px;">
                  <div id="password-strength-bar" class="progress-bar" role="progressbar" style="width: 0%;"></div>
                </div>
                <small id="password-strength-text" class="form-text"></small>
              </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
              <label for="confirm-password" class="form-label">Confirm Password</label>
              <div class="input-group">
                <input type="password" id="confirm-password" name="confirm_password" class="form-control" required minlength="8">
                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                  <i class="bi bi-eye"></i>
                </button>
              </div>
              <small class="form-text validation-feedback text-danger" id="confirmPasswordFeedback">Passwords must match.</small>
            </div>

            <!-- Submit Button -->
            <button
              type="submit"
              id="submit-button"
              class="btn btn-custom w-100 text-white"
              disabled
              data-bs-toggle="tooltip"
              title="Please use a strong password and agree to terms">
              Sign Up
            </button>
          </form>

          <!-- Terms -->
          <div class="form-check d-flex align-items-center gap-2 justify-content-center mb-4 mt-3">
            <input class="form-check-input" type="checkbox" id="terms" required>
            <label class="form-check-label" for="terms">
              <small>I agree to <a href="#" class="text-primary">Terms of Use</a> and <a href="#" class="text-primary">Privacy Policy</a>.</small>
            </label>
          </div>

          <!-- Feedback -->
          <p id="status-message" class="text-danger text-center mt-3"></p>
          <p class="text-center mt-3">
            Already have an account?
            <a href="{{ route('login') }}" class="text-decoration-underline">Log In</a>
          </p>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- UI Script -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.getElementById("togglePassword");
    const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm-password");
    const submitButton = document.getElementById("submit-button");
    const termsCheckbox = document.getElementById("terms");

    let passwordStrengthLevel = 0;

    // Toggle visibility
    togglePassword.addEventListener("click", () => {
      const type = passwordInput.type === "password" ? "text" : "password";
      passwordInput.type = type;
      togglePassword.innerHTML = `<i class="bi ${type === "password" ? "bi-eye" : "bi-eye-slash"}"></i>`;
    });

    toggleConfirmPassword.addEventListener("click", () => {
      const type = confirmPasswordInput.type === "password" ? "text" : "password";
      confirmPasswordInput.type = type;
      toggleConfirmPassword.innerHTML = `<i class="bi ${type === "password" ? "bi-eye" : "bi-eye-slash"}"></i>`;
    });

    // Tooltip
    const tooltipList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipList.map(el => new bootstrap.Tooltip(el));

    // Password strength
    passwordInput.addEventListener("input", () => {
      const value = passwordInput.value;
      passwordStrengthLevel = 0;
      if (value.length >= 8) passwordStrengthLevel++;
      if (/[A-Z]/.test(value)) passwordStrengthLevel++;
      if (/[a-z]/.test(value)) passwordStrengthLevel++;
      if (/\d/.test(value)) passwordStrengthLevel++;
      if (/[\W_]/.test(value)) passwordStrengthLevel++;

      const levels = [
        { text: "Too Weak", color: "bg-danger", width: "20%" },
        { text: "Weak", color: "bg-warning", width: "40%" },
        { text: "Fair", color: "bg-info", width: "60%" },
        { text: "Good", color: "bg-primary", width: "80%" },
        { text: "Strong", color: "bg-success", width: "100%" },
      ];
      const level = levels[passwordStrengthLevel - 1] || levels[0];
      const strengthBar = document.getElementById("password-strength-bar");
      const strengthText = document.getElementById("password-strength-text");

      strengthBar.className = `progress-bar ${level.color}`;
      strengthBar.style.width = level.width;
      strengthText.innerText = level.text;

      checkSubmitReady();
    });

    termsCheckbox.addEventListener("change", checkSubmitReady);

    function checkSubmitReady() {
      const strongEnough = passwordStrengthLevel >= 4;
      submitButton.disabled = !(strongEnough && termsCheckbox.checked);
    }
  });
</script>

</body>
</html>
