<?php

use Illuminate\Support\Facades\Route;

// The public landing page
Route::get('/', function () {
    return view('welcome');
});

// The Tutor Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Temporary Auth Routes (Prevents the 500 error on the homepage)
Route::get('/login', function () {
    return 'Login Page Coming Soon';
})->name('login');

Route::get('/register', function () {
    return 'Registration Page Coming Soon';
})->name('register');