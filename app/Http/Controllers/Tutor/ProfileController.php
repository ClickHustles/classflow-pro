<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        
        // Split the full name so it fits nicely into your First/Last name inputs
        $nameParts = explode(' ', $user->name, 2);
        $firstName = $nameParts[0] ?? '';
        $lastName = $nameParts[1] ?? '';

        return view('tutor.profile', compact('user', 'firstName', 'lastName'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'headline' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'hourly_rate' => 'nullable|numeric|min:0',
        ]);

        $user = Auth::user();
        
        $user->update([
            'name' => $request->first_name . ' ' . $request->last_name,
            'headline' => $request->headline,
            'bio' => $request->bio,
            'hourly_rate' => $request->hourly_rate,
        ]);

        // Kick them back to the onboarding dashboard with a success flag
        return redirect()->route('tutor.onboarding')->with('success', 'Profile updated successfully!');
    }
}