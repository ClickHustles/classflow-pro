<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Marketing & Parent Pages
|--------------------------------------------------------------------------
*/
// The Parent/Student Homepage (Directory Teaser)
Route::get('/', function () {
    return view('home');
})->name('home');

// The High-Conversion Tutor Landing Page
Route::get('/teach', function () {
    return view('welcome'); // The beautiful Tailwind page we just built
})->name('teach');

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
Route::get('/search', function () { return 'Directory Search UI'; })->name('search');
Route::get('/tutors/{slug}', function ($slug) { return "Public Profile for: {$slug}"; })->name('tutor.profile.public');
Route::get('/booking/{tutor}/{slot}', function ($tutor, $slot) { return "Booking flow for {$tutor} at {$slot}"; })->name('booking.flow');
Route::get('/parent/dashboard', function () { return 'Parent Dashboard'; })->name('parent.dashboard');

/*
|--------------------------------------------------------------------------
| Authentication (Temporary Stubs)
|--------------------------------------------------------------------------
*/
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register');
Route::get('/password/forgot', function () { return 'Forgot Password Page'; })->name('password.request');
Route::get('/password/reset/{token}', function ($token) { return 'Reset Password Page'; })->name('password.reset');

/*
|--------------------------------------------------------------------------
| Tutor Dashboard & Management
|--------------------------------------------------------------------------
*/
// Grouping these under /tutor makes it incredibly easy to lock down with middleware later
Route::prefix('tutor')->name('tutor.')->group(function () {
    
    // The main tutor dashboard view we already built
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/onboarding', function () { return 'Tutor Onboarding Checklist'; })->name('onboarding');
    Route::get('/stripe/connect', function () { return 'Stripe Connect Flow'; })->name('stripe.connect');
    Route::get('/profile', function () { return 'Profile Editor'; })->name('profile.edit');
    Route::get('/calendar', function () { return 'Availability & Calendar'; })->name('calendar');
    Route::get('/sessions', function () { return 'Session Management'; })->name('sessions');
    Route::get('/earnings', function () { return 'Earnings & Fees'; })->name('earnings');
    Route::get('/reviews', function () { return 'Reviews Management'; })->name('reviews');
});

// Legacy redirect to prevent 404s if you manually type /dashboard out of habit
Route::get('/dashboard', function () {
    return redirect()->route('tutor.dashboard');
});

/*
|--------------------------------------------------------------------------
| Admin / Internal
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () { return 'Admin Dashboard'; })->name('dashboard');
    Route::get('/tutors', function () { return 'Admin: Tutor Management'; })->name('tutors');
    Route::get('/bookings', function () { return 'Admin: Booking Logs'; })->name('bookings');
    Route::get('/reviews', function () { return 'Admin: Reviews Moderation'; })->name('reviews');
});

/*
|--------------------------------------------------------------------------
| System & Legal
|--------------------------------------------------------------------------
*/
Route::get('/terms', function () { return 'Terms of Service'; })->name('terms');
Route::get('/privacy', function () { return 'Privacy Policy'; })->name('privacy');
Route::get('/trust-and-safety', function () { return 'Trust & Safety Promise'; })->name('trust');

// Stripe Webhook Endpoint (POST request)
Route::post('/stripe/webhook', function () { return response('Webhook Handled', 200); })->name('stripe.webhook');