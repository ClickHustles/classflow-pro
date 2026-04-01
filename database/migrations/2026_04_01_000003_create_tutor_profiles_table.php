<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tutor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            // 1. HERO & SEO
            $table->string('role_title')->nullable(); // Primary Subject/Role
            $table->string('value_prop', 120)->nullable();
            $table->string('primary_city')->nullable();
            $table->string('primary_state')->nullable();
            $table->json('secondary_areas')->nullable(); // Multi-select cities
            $table->json('grade_levels')->nullable(); // Multi-select
            
            // 2. ABOUT (E-E-A-T)
            $table->text('bio_professional')->nullable();
            $table->text('philosophy')->nullable();
            $table->text('student_expectations')->nullable();
            $table->text('parent_expectations')->nullable();
            $table->json('teaching_styles')->nullable(); // Multi-select
            $table->json('learning_needs_exp')->nullable(); // ADHD, Dyslexia, etc.

            // 3. SUBJECTS & SKILLS
            $table->json('subjects_primary')->nullable();
            $table->json('subjects_secondary')->nullable();
            $table->json('test_prep')->nullable();
            $table->json('academic_skills')->nullable(); // Study skills, etc.

            // 4. QUALIFICATIONS
            $table->string('highest_degree')->nullable();
            $table->string('major')->nullable();
            $table->integer('years_experience')->default(0);
            $table->json('languages')->nullable();
            
            // 5. RATES & POLICIES
            $table->integer('rate_online_cents')->nullable();
            $table->integer('rate_in_person_cents')->nullable();
            $table->integer('travel_fee_cents')->default(0);
            $table->text('cancellation_policy')->nullable();

            // 9. SERVICE AREA (Local SEO)
            $table->json('zip_codes')->nullable();
            $table->integer('travel_radius_miles')->default(0);
            $table->boolean('offers_online')->default(true);
            $table->boolean('offers_in_person')->default(false);

            // 10. FAQ & CUSTOM
            $table->json('faqs')->nullable(); // Structured Q&A
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tutor_profiles');
    }
};