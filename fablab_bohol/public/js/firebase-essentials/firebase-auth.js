// ✅ Prevent multiple sign-in requests
let isSigningIn = false;

firebase.auth().onAuthStateChanged((user) => {
    const loginBtn = document.getElementById("login-btn");
    const burgerBtn = document.getElementById("burger-btn");

    if (user) {
        console.log("✅ User authenticated");

        // Hide login, show burger
        if (loginBtn) loginBtn.style.display = "none";
        if (burgerBtn) burgerBtn.style.display = "inline-block";

    } else {
        console.log("🚫 User not logged in");

        // Show login, hide burger
        if (loginBtn) loginBtn.style.display = "inline-block";
        if (burgerBtn) burgerBtn.style.display = "none";
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector(".login-form");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const googleSignInBtn = document.getElementById("googleSignInBtn");

    // ✅ Handle Email/Password Login
    loginForm.addEventListener("submit", function (event) {
      event.preventDefault(); // prevent form from submitting

      const email = emailInput.value;
      const password = passwordInput.value;

      firebase.auth().signInWithEmailAndPassword(email, password)
        .then((userCredential) => {
          const user = userCredential.user;
          console.log("✅ Logged in:", user.email);

          // Redirect after successful login
          window.location.href = "/";
        })
        .catch((error) => {
          console.error("❌ Login error:", error.message);
          document.getElementById("login-status").innerText = error.message;

        });
    });
    
  });

  // ✅ Trigger redirect on button click
  const provider = new firebase.auth.GoogleAuthProvider();

  document.addEventListener("DOMContentLoaded", () => {
    const provider = new firebase.auth.GoogleAuthProvider();
  
    console.log("📦 Firebase SDK loaded? →", typeof firebase !== 'undefined');
    console.log("🔥 Firebase apps initialized? →", firebase.apps.length > 0);
    console.log("👤 Current user on page load →", firebase.auth().currentUser);
  
    // ✅ Sign-in with redirect (with persistence)
    document.getElementById("googleSignInBtn").addEventListener("click", () => {
      console.log("🟡 Google Sign-In clicked → setting persistence & redirecting...");
  
      firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL)
        .then(() => {
          return firebase.auth().signInWithRedirect(provider);
        })
        .catch((error) => {
          console.error("❌ Failed to redirect:", error.message);
        });
    });
  
    // ✅ Handle the redirect result
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

    firebase.auth().onAuthStateChanged((user) => {
    console.log("👤 Auth state changed:", user ? user.email : "No user");
    });


  });
  