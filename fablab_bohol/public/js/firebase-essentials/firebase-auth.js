// ✅ Prevent multiple sign-in requests
let isSigningIn = false;

// ✅ Function to Sign In with Google (Using Pop-Up Only)
function signInWithGoogle() {
    if (isSigningIn) {
        console.warn("⚠️ Sign-in already in progress. Preventing duplicate popups.");
        return;
    }

    console.log("🔄 Google Sign-In Attempt...");
    isSigningIn = true; // Prevent duplicate sign-ins

    const provider = new firebase.auth.GoogleAuthProvider();

    firebase.auth().signInWithPopup(provider)
        .then((result) => {
            console.log("✅ Google Sign-In Success:", result.user);

            // Store user info
            localStorage.setItem("userName", result.user.displayName);
            localStorage.setItem("userEmail", result.user.email);

            // ✅ Redirect to Home **Only if Authentication Succeeds**
            setTimeout(() => {
                console.log("🔄 Redirecting to Home...");
                window.location.href = "http://127.0.0.1:8000/";
            }, 500);
        })
        .catch((error) => {
            console.error("❌ Error during Google Sign-In:", error.code, error.message);
            console.warn("🔍 Full Firebase Error Object:", error);
        })
        .finally(() => {
            isSigningIn = false; // Reset flag
        });
}

// ✅ Track Authentication State (Auto Redirect If Already Logged In)
firebase.auth().onAuthStateChanged((user) => {
    if (user) {
        console.log("✅ User is authenticated:", user.displayName);
        
        // ✅ Redirect to Home if user is already logged in
        if (window.location.href !== "http://127.0.0.1:8000/") {
            console.log("🔄 Redirecting to Home...");
            window.location.href = "http://127.0.0.1:8000/";
        }
    } else {
        console.log("🚫 User is not signed in.");
    }
});

// ✅ Make signInWithGoogle Globally Available
window.signInWithGoogle = signInWithGoogle;
