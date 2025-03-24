document.getElementById("signup-form").addEventListener("submit", async function (event) {
    event.preventDefault();

    // Get form values
    const name = document.getElementById("name").value;
    const disaggregation = document.getElementById("disaggregation").value;
    const category = document.getElementById("category").value;
    const contact = document.getElementById("contact").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm-password").value;
    const statusMessage = document.getElementById("status-message");

    // Password validation
    if (password !== confirmPassword) {
        statusMessage.className = "text-danger text-center mt-3";
        statusMessage.innerText = "Passwords do not match!";
        return;
    }

    try {
        const userCredential = await firebase.auth().createUserWithEmailAndPassword(email, password);
        const user = userCredential.user;

        // Save additional user info to Firestore
        await firebase.firestore().collection("users").doc(user.uid).set({
            fullName: name,
            disaggregation: disaggregation,
            category: category,
            contact: contact,
            email: email,
            createdAt: firebase.firestore.FieldValue.serverTimestamp()
        });

        statusMessage.className = "text-success text-center mt-3";
        statusMessage.innerText = "Sign-up successful! Redirecting...";
        setTimeout(() => {
            window.location.href = "/login";
        }, 2000);

    } catch (error) {
        console.error("Firebase Error:", error);
        statusMessage.className = "text-danger text-center mt-3";
        statusMessage.innerText = error.message;
    }
});
