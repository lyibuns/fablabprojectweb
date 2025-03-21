// firebase-init.js

// Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyAGiSyYZvQksuPhafnzi_5usbHOibZNiJ4",
  authDomain: "fablab-8c785.firebaseapp.com",
  projectId: "fablab-8c785",
  storageBucket: "fablab-8c785.appspot.com",
  messagingSenderId: "300739487345",
  appId: "1:300739487345:web:0f98a77dcf3dc245c5ddd0",
  measurementId: "G-WPC50GVWPW"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
console.log("✅ Firebase initialized successfully.");

// Export Firebase services
const auth = firebase.auth();
const db = firebase.firestore();
