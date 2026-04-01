<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // 1. Validate the incoming data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'subject' => 'required|string'
        ]);

        // 2. Combine the name
        $fullName = $request->first_name . ' ' . $request->last_name;

        // 3. Create a unique URL slug (e.g., sarah-mitchell-4928)
        $slug = Str::slug($fullName) . '-' . rand(1000, 9999);

        // 4. Create the Tutor in the database
        $user = User::create([
            'name' => $fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'tutor', // Force the role to tutor for this form
            'slug' => $slug,
            'headline' => $request->subject . ' Tutor', // Give them a starter headline
            'is_onboarded' => false,
        ]);

        // 5. Log them in automatically
        Auth::login($user);

        // 6. Redirect to Step 1 of the Onboarding Checklist
        return redirect()->route('tutor.onboarding');
    }
}