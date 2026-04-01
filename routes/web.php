<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Tutor\ProfileController;
use App\Http\Controllers\Tutor\OnboardingController;
use App\Http\Controllers\PublicTutorController; // New Controller for Storefront

/*
|--------------------------------------------------------------------------
| Public Marketing & Parent Pages
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('home'); })->name('home');
Route::get('/teach', function () { return view('welcome'); })->name('teach');
Route::get('/pricing', function () { return view('marketing.pricing'); })->name('pricing');
Route::get('/how-it-works', function () { return view('marketing.how-it-works'); })->name('how-it-works');
Route::get('/about', function () { return view('marketing.about'); })->name('about');
Route::get('/contact', function () { return view('marketing.contact'); })->name('contact');
Route::get('/blog', function () { return view('marketing.blog'); })->name('blog');

/*
|--------------------------------------------------------------------------
| Parent / Student Journey (The Marketplace)
|--------------------------------------------------------------------------
*/
Route::get('/search', function () { return view('search'); })->name('search');

// Use a real controller for the Public Profile to handle SEO & Schema auto-generation
Route::get('/tutors/{slug}', [PublicTutorController::class, 'show'])->name('tutor.profile.public');

Route::get('/booking/{tutor}/{slot}', function ($tutor, $slot) { 
    return view('booking.checkout', compact('tutor', 'slot')); 
})->name('booking.flow');

Route::middleware(['auth'])->group(function() {
    Route::get('/parent/dashboard', function () { return view('parent.dashboard'); })->name('parent.dashboard');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/password/forgot', function () { return view('auth.passwords.email'); })->name('password.request');
Route::get('/password/reset/{token}', function ($token) { return view('auth.passwords.reset', ['token' => $token]); })->name('password.reset');

/*
|--------------------------------------------------------------------------
| Tutor Dashboard & Management (Protected & Role-Checked)
|--------------------------------------------------------------------------
*/
// Note: I'm assuming you have or will have a 'role:tutor' middleware for extra security
Route::middleware(['auth'])->prefix('tutor')->name('tutor.')->group(function () {
    
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    
    // --- ADVANCED ONBOARDING WIZARD ---
    Route::get('/onboarding', [OnboardingController::class, 'show'])->name('onboarding');
    Route::post('/onboarding/save', [OnboardingController::class, 'update'])->name('onboarding.save');
    
    Route::get('/stripe/connect', function () { return view('tutor.stripe'); })->name('stripe.connect');
    
    // DYNAMIC PROFILE MANAGEMENT (For editing AFTER onboarding is done)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/calendar', function () { return view('tutor.calendar'); })->name('calendar');
    Route::get('/sessions', function () { return view('tutor.sessions'); })->name('sessions');
    Route::get('/earnings', function () { return view('tutor.earnings'); })->name('earnings');
    Route::get('/reviews', function () { return view('tutor.reviews'); })->name('reviews');
});

// Smart redirect: if they are logged in as a tutor, send them to tutor.dashboard
Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->isTutor()) {
        return redirect()->route('tutor.dashboard');
    }
    return redirect()->route('parent.dashboard');
});

/*
|--------------------------------------------------------------------------
| Admin & System
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () { return view('admin.dashboard'); })->name('dashboard');
    Route::get('/tutors', function () { return view('admin.tutors.index'); })->name('tutors');
});

Route::get('/terms', function () { return view('legal.terms'); })->name('terms');
Route::get('/privacy', function () { return view('legal.privacy'); })->name('privacy');
Route::post('/stripe/webhook', function () { return response('Webhook Handled', 200); })->name('stripe.webhook');