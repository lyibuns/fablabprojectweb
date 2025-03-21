<?php

// Home
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homepage\IndexController;
use App\Http\Controllers\Homepage\NewsController;
use App\Http\Controllers\Homepage\EventsController;
use App\Http\Controllers\Homepage\FacilitiesController;
use App\Http\Controllers\Homepage\AboutusController;
use App\Http\Controllers\Homepage\LocationController;

// Auth
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;

// Profile
use App\Http\Controllers\Profile\ProfileEventsController;
use App\Http\Controllers\Profile\ProfileBookingController;
use App\Http\Controllers\Profile\ProfileController;



use Illuminate\Http\Request;
use Kreait\Firebase\Auth as FirebaseAuth;
use Illuminate\Support\Facades\Auth;


Route::post('/firebase-auth', function (Request $request) {
    try {
        $firebaseAuth = app('firebase.auth');
        $verifiedIdToken = $firebaseAuth->verifyIdToken($request->token);
        $firebaseUserId = $verifiedIdToken->claims()->get('sub'); // Firebase UID
        $email = $verifiedIdToken->claims()->get('email');
        $name = $verifiedIdToken->claims()->get('name');

        // Store the session (No need to store user in MySQL if using Firestore)
        session(['firebase_uid' => $firebaseUserId, 'email' => $email, 'name' => $name]);

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 401);
    }
});


// Homepage Route
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/facilities', [FacilitiesController::class, 'index'])->name('facilities');
Route::get('/aboutus', [AboutusController::class, 'index'])->name('aboutus');
Route::get('/location', [LocationController::class, 'index'])->name('location');

//Auth Route

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup']);


//Profile Route

Route::get('/profileevents', [ProfileEventsController::class, 'index'])->name('profileevents');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profilebooking', [ProfileBookingController::class, 'index'])->name('profilebooking');

Route::get('/home', function () {
    return view('home');
})->middleware('firebase.auth');

