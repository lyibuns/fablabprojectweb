import { auth, db } from "./firebase.js";
import { createUserWithEmailAndPassword } from "firebase/auth";
import { doc, setDoc, serverTimestamp } from "firebase/firestore";

// Handle Sign-Up Form Submission
document.getElementById("signup-form").addEventListener("submit", async function (event) {
    event.preventDefault();

    // Get form values
    const name = document.getElementById("name").value;
    const gender = document.getElementById("gender").value;
    const contact = document.getElementById("contact").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm-password").value;
    const statusMessage = document.getElementById("status-message");

    // Password validation
    if (password !== confirmPassword) {
        statusMessage.innerText = "Passwords do not match!";
        return;
    }

    try {
        // Create Firebase Authentication user
        const userCredential = await createUserWithEmailAndPassword(auth, email, password);
        const user = userCredential.user;

        // Save user details in Firestore
        await setDoc(doc(db, "users", user.uid), {
            fullName: name,
            gender: gender,
            contact: contact,
            email: email,
            createdAt: serverTimestamp(),
        });

        statusMessage.innerText = "Sign-up successful! Redirecting...";
        setTimeout(() => {
            window.location.href = "/login"; // Redirect to login
        }, 2000);

    } catch (error) {
        statusMessage.innerText = error.message;
    }
});
