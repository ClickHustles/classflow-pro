<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // FIX: Changed from User::role('tutor') to User::where('role', 'tutor')
        $query = User::where('role', 'tutor')
            ->where('is_onboarded', true)
            ->with(['profile', 'media']);

        // Filter by Subject
        if ($request->filled('subject')) {
            $query->whereHas('profile', function($q) use ($request) {
                $q->whereJsonContains('subjects_primary', $request->subject);
            });
        }

        // Filter by City/Location
        if ($request->filled('location')) {
            $query->whereHas('profile', function($q) use ($request) {
                $q->where('primary_city', 'like', '%' . $request->location . '%')
                  ->orWhereJsonContains('secondary_cities', $request->location);
            });
        }

        // Filter by Max Rate
        if ($request->filled('max_rate')) {
            $query->whereHas('profile', function($q) use ($request) {
                $q->where('rate_online', '<=', $request->max_rate);
            });
        }

        $tutors = $query->paginate(12)->withQueryString();

        return view('search', compact('tutors'));
    }
}