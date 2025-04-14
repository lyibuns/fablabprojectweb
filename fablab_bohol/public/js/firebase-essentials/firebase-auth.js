// ✅ Prevent multiple sign-in requests
let isSigningIn = false;

// ✅ Firebase auth state change handler
firebase.auth().onAuthStateChanged((user) => {
    const loginBtn = document.getElementById("login-btn");
    const burgerBtn = document.getElementById("burger-btn");

    console.log("👤 Auth state changed:", user ? user.email : "No user");

    if (user) {
        console.log("✅ User authenticated");

        if (loginBtn) loginBtn.style.display = "none";
        if (burgerBtn) burgerBtn.style.display = "inline-block";
    } else {
        console.log("🚫 User not logged in");

        if (loginBtn) loginBtn.style.display = "inline-block";
        if (burgerBtn) burgerBtn.style.display = "none";
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector(".login-form");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const googleSignInBtn = document.getElementById("googleSignInBtn");
    const loginStatus = document.getElementById("login-status");
    const provider = new firebase.auth.GoogleAuthProvider();

    console.log("📦 Firebase SDK loaded? →", typeof firebase !== 'undefined');
    console.log("🔥 Firebase apps initialized? →", firebase.apps.length > 0);
    console.log("👤 Current user on page load →", firebase.auth().currentUser);

    // ✅ Email/Password login
    if (loginForm) {
        loginForm.addEventListener("submit", function (event) {
            event.preventDefault();

            const email = emailInput?.value;
            const password = passwordInput?.value;

            if (!email || !password) {
                if (loginStatus) loginStatus.innerText = "Email and password required.";
                return;
            }

            firebase.auth().signInWithEmailAndPassword(email, password)
                .then((userCredential) => {
                    const user = userCredential.user;
                    console.log("✅ Logged in:", user.email);
                    window.location.href = "/";
                })
                .catch((error) => {
                    console.error("❌ Login error:", error.message);
                    if (loginStatus) loginStatus.innerText = error.message;
                });
        });
    }

    // ✅ Google Sign-In
    if (googleSignInBtn) {
        googleSignInBtn.addEventListener("click", () => {
            console.log("🟡 Google Sign-In clicked");

            firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL)
                .then(() => {
                    return firebase.auth().signInWithRedirect(provider);
                })
                .catch((error) => {
                    console.error("❌ Failed to redirect:", error.message);
                });
        });
    }

    // ✅ Handle sign-in redirect result (Google)
    firebase.auth().getRedirectResult()
        .then((result) => {
            console.log("📥 getRedirectResult result:", result);

            if (result.user) {
                console.log("✅ Signed in via redirect:", result.user.email);
                localStorage.setItem("userEmail", result.user.email);
                window.location.href = "/";
            } else {
                console.log("ℹ️ No user found in redirect result.");
            }
        })
        .catch((error) => {
            console.error("❌ getRedirectResult error:", error.message);
        });
});
