<?php

use Illuminate\Support\Facades\Route;

// The public landing page
Route::get('/', function () {
    return view('welcome');
});

// The Tutor Dashboard (Temporarily unprotected so you can see it instantly)
Route::get('/dashboard', function () {
    return view('dashboard');
});