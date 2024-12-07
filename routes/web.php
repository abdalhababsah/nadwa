<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatestWorkController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ServiceController;

// Latest Works Routes
Route::resource('latest-works', LatestWorkController::class);

// Services Routes

// Home Route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Services Page Route
Route::get('/services', function () {
    return view('services');
})->name('services');

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    // Show login form
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');

    // Handle login submission
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');

    // Handle logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    
    // Protected Routes (e.g., Dashboard)
    Route::middleware('auth')->group(function () {
        Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index'); // List services
        Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create'); // Show create form
        Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store'); // Store service
        Route::get('/services/{id}', [ServiceController::class, 'show'])->name('admin.services.show'); // Show single service
        Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit'); // Show edit form
        Route::put('/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update'); // Update service
        Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy'); // Delete service


        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        
        // Add more admin routes here
    });
});
