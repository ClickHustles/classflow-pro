<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Tutor\ProfileController;
use App\Http\Controllers\Tutor\OnboardingController;

/*
|--------------------------------------------------------------------------
| Public Marketing & Parent Pages
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('home'); })->name('home');
Route::get('/teach', function () { return view('welcome'); })->name('teach');
Route::get('/pricing', function () { return 'Pricing Page'; })->name('pricing');
Route::get('/how-it-works', function () { return 'How It Works Page'; })->name('how-it-works');
Route::get('/about', function () { return 'About Us Page'; })->name('about');
Route::get('/contact', function () { return 'Contact Page'; })->name('contact');
Route::get('/blog', function () { return 'Blog / Resources'; })->name('blog');

/*
|--------------------------------------------------------------------------
| Parent / Student Journey
|--------------------------------------------------------------------------
*/
Route::get('/search', function () { return view('search'); })->name('search');
Route::get('/tutors/{slug}', function ($slug) { return view('tutor-profile'); })->name('tutor.profile.public');
Route::get('/booking/{tutor}/{slot}', function ($tutor, $slot) { return view('booking.checkout'); })->name('booking.flow');
Route::get('/parent/dashboard', function () { return 'Parent Dashboard'; })->name('parent.dashboard');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/password/forgot', function () { return 'Forgot Password Page'; })->name('password.request');
Route::get('/password/reset/{token}', function ($token) { return 'Reset Password Page'; })->name('password.reset');

/*
|--------------------------------------------------------------------------
| Tutor Dashboard & Management
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('tutor')->name('tutor.')->group(function () {
    
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    
    // --- ADVANCED ONBOARDING WIZARD ---
    Route::get('/onboarding', [OnboardingController::class, 'show'])->name('onboarding');
    Route::post('/onboarding/save', [OnboardingController::class, 'update'])->name('onboarding.save');
    
    Route::get('/stripe/connect', function () { return view('tutor.stripe'); })->name('stripe.connect');
    
    // DYNAMIC PROFILE MANAGEMENT
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/calendar', function () { return view('tutor.calendar'); })->name('calendar');
    Route::get('/sessions', function () { return 'Session Management'; })->name('sessions');
    Route::get('/earnings', function () { return 'Earnings & Fees'; })->name('earnings');
    Route::get('/reviews', function () { return 'Reviews Management'; })->name('reviews');
});

// Shortcut redirect
Route::get('/dashboard', function () { return redirect()->route('tutor.dashboard'); });

/*
|--------------------------------------------------------------------------
| Admin & System
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () { return view('admin.dashboard'); })->name('dashboard');
    Route::get('/tutors', function () { return 'Admin: Tutor Management'; })->name('tutors');
});

Route::get('/terms', function () { return 'Terms of Service'; })->name('terms');
Route::get('/privacy', function () { return 'Privacy Policy'; })->name('privacy');
Route::post('/stripe/webhook', function () { return response('Webhook Handled', 200); })->name('stripe.webhook');