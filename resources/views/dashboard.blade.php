@extends('layouts.app')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-edu-900">Welcome back!</h1>
            <p class="text-slate-600 mt-1">Here is what is happening with your tutoring business today.</p>
        </div>
        <button class="px-5 py-2.5 bg-edu-800 text-white font-medium rounded-lg shadow-sm hover:bg-edu-900 transition-colors">
            + New Booking
        </button>
    </div>

    <div class="bg-apple-100 border border-apple-500 rounded-xl p-6 mb-8 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-sm">
        <div>
            <h3 class="text-apple-700 font-bold text-lg flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                Action Required: Connect Payouts
            </h3>
            <p class="text-apple-600 mt-1 text-sm">You must link your bank account via Stripe to appear in the public directory and accept bookings.</p>
        </div>
        <button class="px-5 py-2.5 bg-apple-600 text-white font-medium rounded-lg shadow-sm hover:bg-apple-700 whitespace-nowrap transition-colors">
            Connect Stripe
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 border border-edu-200 shadow-sm">
            <p class="text-sm font-medium text-slate-500 mb-1">Total Earnings</p>
            <p class="text-3xl font-bold text-edu-900">$0.00</p>
        </div>
        <div class="bg-white rounded-xl p-6 border border-edu-200 shadow-sm">
            <p class="text-sm font-medium text-slate-500 mb-1">Upcoming Sessions</p>
            <p class="text-3xl font-bold text-edu-900">0</p>
        </div>
        <div class="bg-white rounded-xl p-6 border border-edu-200 shadow-sm">
            <p class="text-sm font-medium text-slate-500 mb-1">Profile Views</p>
            <p class="text-3xl font-bold text-edu-900">0</p>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-edu-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-edu-100 bg-slate-50">
            <h3 class="font-bold text-edu-900">Your Upcoming Schedule</h3>
        </div>
        <div class="p-8 text-center text-slate-500">
            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <p>No upcoming bookings yet.</p>
        </div>
    </div>
@endsection