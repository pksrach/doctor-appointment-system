<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\DoctorController;
use App\Http\Controllers\Frontend\HomeController;
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
});


// Manage Doctor Routes
Route::controller(DoctorController::class)->group(function () {
    Route::get('/doctor', [DoctorController::class, 'index']);
    Route::get('/doctor-profile', [DoctorController::class, 'doctorProfile']);
});

// Manage Booking Routes
Route::controller(BookingController::class)->group(function () {
    Route::get('/booking', [BookingController::class, 'index']);
});
