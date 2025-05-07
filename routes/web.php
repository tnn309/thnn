<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/introduce', function () {
    return view('introduce');
})->name('introduce');

// Freelancer Routes
Route::prefix('freelancers')->group(function () {
    Route::get('/', [FreelancerController::class, 'index'])->name('freelancers.index');
    Route::get('/{freelancer}', [FreelancerController::class, 'show'])->name('freelancers.show');
    Route::get('/{freelancer}/json', [FreelancerController::class, 'showJson'])->name('freelancers.show.json');
});

// Contact Routes
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Authentication Routes
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Protected Routes (yêu cầu đăng nhập)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::prefix('bookings')->group(function () {
        Route::get('/create/{freelancer}', [BookingController::class, 'create'])->name('bookings.create');
        Route::post('/', [BookingController::class, 'store'])->name('bookings.store');
    });
});