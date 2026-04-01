<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            // 'tutor' or 'parent' to easily route their dashboard experience
            $table->enum('role', ['tutor', 'parent'])->default('parent'); 
            
            // --- Marketplace Specific Fields (Nullable for Parents) ---
            $table->string('slug')->unique()->nullable(); // e.g. 'sarah-mitchell'
            $table->string('stripe_account_id')->unique()->nullable();
            $table->string('headline')->nullable(); // e.g. 'High School Math Specialist'
            $table->text('bio')->nullable(); // AI generated philosophy
            $table->decimal('hourly_rate', 8, 2)->nullable(); // e.g. 65.00
            $table->string('profile_photo_path', 2048)->nullable();
            $table->boolean('is_onboarded')->default(false); // Tracks checklist completion
            
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};