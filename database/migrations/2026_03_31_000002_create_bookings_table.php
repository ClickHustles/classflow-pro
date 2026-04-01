
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            // The two parties involved
            $table->foreignId('tutor_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('parent_id')->constrained('users')->cascadeOnDelete();
            
            // Scheduling
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('status')->default('pending'); // pending, confirmed, completed, cancelled
            
            // Financials (Stored in cents for Stripe compatibility)
            $table->integer('tutor_rate_cents'); 
            $table->integer('platform_fee_cents')->default(500); // The flat $5 fee
            $table->integer('total_amount_cents');
            
            // Stripe Tracking
            $table->string('stripe_payment_intent_id')->nullable();
            $table->string('stripe_transfer_id')->nullable(); // The payload sent to the tutor
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};