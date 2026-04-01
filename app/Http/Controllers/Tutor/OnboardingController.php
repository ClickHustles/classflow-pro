<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TutorProfile;

class OnboardingController extends Controller
{
    /**
     * Show the Multi-Step Onboarding Form
     */
    public function show()
    {
        $user = Auth::user();
        // Ensure the tutor has a profile record to work with
        $profile = $user->profile ?: $user->profile()->create();

        return view('tutor.onboarding-wizard', compact('user', 'profile'));
    }

    /**
     * Handle the AJAX or Form Save for each step
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        // 1. Handle Photo Uploads (Section 1 & 8) via Spatie
        if ($request->hasFile('avatar')) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        // 2. Map the "Full Meal Deal" inputs to the Profile
        // We use $request->all() but the Model $fillable protects us
        $profile->update($request->only([
            'role_title', 'value_prop', 'primary_city', 'primary_state', 
            'secondary_cities', 'zip_codes', 'travel_radius', 'grade_levels',
            'bio_pro', 'philosophy', 'expect_student', 'expect_parent', 
            'teaching_styles', 'learning_needs', 'subjects_primary', 
            'subjects_secondary', 'academic_skills', 'highest_degree', 
            'major', 'years_experience', 'languages', 'rate_online', 
            'rate_in_person', 'fee_travel', 'fee_assessment', 
            'policy_cancellation', 'faqs'
        ]));

        // 3. Update the User's main display name if changed
        if ($request->filled('name')) {
            $user->update(['name' => $request->name]);
        }

        // 4. Progress Tracking
        // If they've reached the end, mark as onboarded
        if ($request->has('complete_onboarding')) {
            $user->update(['is_onboarded' => true]);
            return redirect()->route('tutor.dashboard')->with('success', 'Your professional profile is LIVE!');
        }

        return back()->with('success', 'Progress saved!');
    }
}