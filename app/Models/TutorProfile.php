<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TutorProfile extends Model
{
    protected $fillable = [
        'user_id',
        'role_title',
        'value_prop',
        'primary_city',
        'primary_state',
        'secondary_cities',
        'zip_codes',
        'travel_radius',
        'grade_levels',
        'bio_pro',
        'philosophy',
        'expect_student',
        'expect_parent',
        'teaching_styles',
        'learning_needs',
        'subjects_primary',
        'subjects_secondary',
        'academic_skills',
        'highest_degree',
        'major',
        'years_experience',
        'languages',
        'is_verified',
        'rate_online',
        'rate_in_person',
        'fee_travel',
        'fee_assessment',
        'policy_cancellation',
        'faqs',
    ];

    /**
     * Critical for "Full Meal Deal" UI: 
     * Automatically converts database JSON strings into clean PHP arrays for your multi-selects.
     */
    protected $casts = [
        'secondary_cities' => 'array',
        'zip_codes' => 'array',
        'grade_levels' => 'array',
        'teaching_styles' => 'array',
        'learning_needs' => 'array',
        'subjects_primary' => 'array',
        'subjects_secondary' => 'array',
        'academic_skills' => 'array',
        'languages' => 'array',
        'faqs' => 'array',
        'is_verified' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}