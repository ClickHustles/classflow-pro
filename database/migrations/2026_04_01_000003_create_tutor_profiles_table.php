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
            
            // 1 & 9. HERO, SEO & SERVICE AREA
            $table->string('role_title')->nullable(); // e.g. "Algebra Specialist"
            $table->string('value_prop', 120)->nullable();
            $table->string('primary_city')->nullable();
            $table->string('primary_state')->nullable();
            $table->json('secondary_cities')->nullable();
            $table->json('zip_codes')->nullable();
            $table->integer('travel_radius')->default(0);
            $table->json('grade_levels')->nullable(); 

            // 2. ABOUT (E-E-A-T)
            $table->text('bio_pro')->nullable();
            $table->text('philosophy')->nullable();
            $table->text('expect_student')->nullable();
            $table->text('expect_parent')->nullable();
            $table->json('teaching_styles')->nullable();
            $table->json('learning_needs')->nullable();

            // 3. SUBJECTS & SKILLS
            $table->json('subjects_primary')->nullable();
            $table->json('subjects_secondary')->nullable();
            $table->json('academic_skills')->nullable();

            // 4. QUALIFICATIONS
            $table->string('highest_degree')->nullable();
            $table->string('major')->nullable();
            $table->integer('years_experience')->default(0);
            $table->json('languages')->nullable();
            $table->boolean('is_verified')->default(false);

            // 5. RATES & POLICIES (Stored in Cents)
            $table->integer('rate_online')->nullable();
            $table->integer('rate_in_person')->nullable();
            $table->integer('fee_travel')->default(0);
            $table->integer('fee_assessment')->default(0);
            $table->text('policy_cancellation')->nullable();

            // 10. FAQ
            $table->json('faqs')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tutor_profiles');
    }
};