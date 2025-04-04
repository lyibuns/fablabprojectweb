
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("signup-form");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm-password");
    const strengthBar = document.getElementById("password-strength-bar");
    const strengthText = document.getElementById("password-strength-text");
    const termsCheckbox = document.getElementById("terms");
    const submitButton = document.getElementById("submit-button");
    const statusMessage = document.getElementById("status-message");
    const successToastEl = document.getElementById("successToast");
    const successToast = successToastEl ? new bootstrap.Toast(successToastEl) : null;

    if (submitButton) new bootstrap.Tooltip(submitButton);

    let passwordStrengthLevel = 0;

    const isValidEmail = (email) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    const isValidContact = (contact) => /^\d{10,15}$/.test(contact);
    const isStrongPassword = (pw) => /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/.test(pw);

    function validateField(id, condition) {
        const field = document.getElementById(id);
        if (!field) return;
        field.classList.toggle("is-valid", Boolean(condition));
        field.classList.toggle("is-invalid", !condition);
    }

    function updateSubmitButtonState() {
        const strongEnough = passwordStrengthLevel >= 4;
        const termsAccepted = termsCheckbox.checked;
        submitButton.disabled = !(strongEnough && termsAccepted);
    }

    passwordInput.addEventListener("input", function () {
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
            { text: "Strong", color: "bg-success", width: "100%" }
        ];
        const level = levels[passwordStrengthLevel - 1] || levels[0];

        strengthBar.className = `progress-bar ${level.color}`;
        strengthBar.style.width = level.width;
        strengthText.innerText = level.text;

        validateField("password", passwordStrengthLevel >= 4);
        updateSubmitButtonState();
    });

    confirmPasswordInput.addEventListener("input", () => {
        const match = confirmPasswordInput.value === passwordInput.value;
        validateField("confirm-password", match);
    });

    termsCheckbox.addEventListener("change", updateSubmitButtonState);

    form.addEventListener("submit", async function (event) {
        event.preventDefault();

        const lastName = document.getElementById("last_name")?.value.trim();
        const firstName = document.getElementById("first_name")?.value.trim();
        const disaggregation = document.getElementById("disaggregation")?.value;
        const category = document.getElementById("category")?.value;
        const contact = document.getElementById("contact")?.value.trim();
        const email = document.getElementById("email")?.value.trim();
        const password = passwordInput?.value;
        const confirmPassword = confirmPasswordInput?.value;

        let isValid =
            Boolean(lastName) &&
            Boolean(firstName) &&
            Boolean(disaggregation) &&
            Boolean(category) &&
            isValidContact(contact) &&
            isValidEmail(email) &&
            isStrongPassword(password) &&
            password === confirmPassword;

        validateField("last_name", lastName);
        validateField("first_name", firstName);
        validateField("disaggregation", disaggregation);
        validateField("category", category);
        validateField("contact", isValidContact(contact));
        validateField("email", isValidEmail(email));
        validateField("password", isStrongPassword(password));
        validateField("confirm-password", password === confirmPassword);

        if (!isValid) {
            statusMessage.className = "text-danger text-center mt-3";
            statusMessage.innerText = "Please correct the highlighted fields.";
            return;
        }

        try {
            const userQuery = await firebase.firestore()
                .collection("users")
                .where("email", "==", email)
                .limit(1)
                .get();

            if (!userQuery.empty) {
                statusMessage.className = "text-danger text-center mt-3";
                statusMessage.innerText = "This email is already registered.";
                return;
            }

            const userCredential = await firebase.auth().createUserWithEmailAndPassword(email, password);
            const user = userCredential.user;

            await firebase.firestore().collection("users").doc(user.uid).set({
                lastName,
                firstName,
                disaggregation,
                category,
                contact,
                email,
                createdAt: firebase.firestore.FieldValue.serverTimestamp()
            });

            form.reset();
            form.querySelectorAll(".is-valid, .is-invalid").forEach(el => el.classList.remove("is-valid", "is-invalid"));
            updateSubmitButtonState();
            statusMessage.innerText = "";

            if (successToast) successToast.show();

            setTimeout(() => {
                window.location.href = "/login";
            }, 2000);

        } catch (error) {
            console.error("Firebase Error:", error);
            statusMessage.className = "text-danger text-center mt-3";
            statusMessage.innerText = error.message || "Registration failed.";
        }
    });
});

