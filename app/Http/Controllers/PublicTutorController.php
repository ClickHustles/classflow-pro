<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicTutorController extends Controller
{
    /**
     * Display the public profile for a specific tutor.
     * This is the "Storefront" that parents and students see.
     */
    public function show(string $slug): View
    {
        // 1. Find the tutor by slug or fail with a 404
        // We eager-load the 'profile' and 'media' to keep things fast
        $tutor = User::where('slug', $slug)
            ->where('role', 'tutor')
            ->with(['profile'])
            ->firstOrFail();

        // 2. SEO & Structured Data Preparation
        // We'll pass this to the view to generate the "Care.com Killer" Google results
        $schema = $this->generateSchema($tutor);

        return view('tutor-profile', compact('tutor', 'schema'));
    }

    /**
     * Generate JSON-LD Schema for Local SEO
     * This tells Google exactly who this person is and what they teach.
     */
    private function generateSchema(User $tutor): string
    {
        $profile = $tutor->profile;
        
        $data = [
            "@context" => "https://schema.org",
            "@type" => "Tutor",
            "name" => $tutor->name,
            "description" => $profile->value_prop ?? $tutor->headline,
            "image" => $tutor->getFirstMediaUrl('avatar'),
            "address" => [
                "@type" => "PostalAddress",
                "addressLocality" => $profile->primary_city ?? '',
                "addressRegion" => $profile->primary_state ?? '',
            ],
            "offers" => [
                "@type" => "Offer",
                "price" => $profile->rate_online ?? 0,
                "priceCurrency" => "USD"
            ]
        ];

        return json_encode($data);
    }
}