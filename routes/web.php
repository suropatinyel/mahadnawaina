<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SignUpController;
//landing page
Route::get('/welcome', function () {
    return view('welcome');
})->name('dashboard');

// Show login page
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('user.login');

//show sign up form
Route::get('/signup', function () {
    return view('signup');
})->name('signup');
Route::post('/signup', [SignUpController::class, 'store'])->name('signup.store');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/edit', function () {
    return view('edit');
});
Route::get('/cek', function () {
    return view('template.admin.pengumuman');
});

// Protect pages (only accessible after login)
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/monthly-payment', function () {
        return view('monthly-payment');
    });

    Route::get('/sign-up', function () {
        return view('sign-up');
    });

    Route::get('/contact', function () {
        return view('contact');
    });
});
