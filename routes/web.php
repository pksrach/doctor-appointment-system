<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\DoctorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PatientDashbaordController;
use Illuminate\Support\Facades\Route;

// Manage Auth Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);
});

// Manage Home Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/term-condition', [HomeController::class, 'termsConditions']);
    Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy']);
    Route::get('/about-us', [HomeController::class, 'aboutUs']);
    Route::get('/contact-us', [HomeController::class, 'contactUs']);
});


// Manage Doctor Routes
Route::controller(DoctorController::class)->group(function () {
    Route::get('/doctor', [DoctorController::class, 'index']);
    Route::get('/doctor-profile', [DoctorController::class, 'doctorProfile']);
});

// Manage Booking Routes
Route::controller(BookingController::class)->group(function () {
    Route::get('/booking', [BookingController::class, 'index']);
    Route::get('/checkout', [BookingController::class, 'checkout']);
});

// Manage Customer Dashboard Routes
Route::controller(PatientDashbaordController::class)->group(function () {
    Route::get('/patient-dashboard', [PatientDashbaordController::class, 'index']);
    Route::get('/favorite', [PatientDashbaordController::class, 'favorite']);
    Route::get('/profile-setting', [PatientDashbaordController::class, 'profileSetting']);
    Route::get('/change-password', [PatientDashbaordController::class, 'changePassword']);
});
