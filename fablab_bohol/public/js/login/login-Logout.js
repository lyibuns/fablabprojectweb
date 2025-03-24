
    function handleLoginRedirect() {
        const user = firebase.auth().currentUser;

        if (user) {
            window.location.href = "/"; 
        } else {
            window.location.href = "/login";
        }
    }



    function logoutUser() {
        firebase.auth().signOut().then(() => {
            console.log("✅ Logged out");
    
            // Show Log In button again
            const loginBtn = document.getElementById("login-btn");
            const burgerBtn = document.getElementById("burger-btn");
    
            if (loginBtn) loginBtn.style.display = "inline-block";
            if (burgerBtn) burgerBtn.style.display = "none";
    
            // Redirect to home
            window.location.href = "/";
        }).catch((error) => {
            console.error("❌ Logout Error:", error);
        });
    }
    