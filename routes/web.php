<?php

use App\Http\Controllers\Backend\BackendDashboardController;
use App\Http\Controllers\Backend\BackendDoctorController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\DoctorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PatientDashbaordController;
use Illuminate\Support\Facades\Route;

// Manage Auth Routes
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('login-me', [AuthController::class, 'loginMe'])->name('login-me');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/save', [AuthController::class, 'registerSave'])->name('register-save');
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
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
    Route::post('/profile-update', [PatientDashbaordController::class, 'profileUpdate'])->name('profile-update');
    Route::get('/change-password', [PatientDashbaordController::class, 'changePassword']);
});


//------------------------------------------------------------------------------------------------------
// Manage Admin Routes
Route::group(['prefix' => 'backend'], function () {
    Route::get('/dashboard', [BackendDashboardController::class, 'index'])->name('backend.dashboard');
    Route::get('/doctor', [BackendDoctorController::class, 'index'])->name('backend.doctor');

});
