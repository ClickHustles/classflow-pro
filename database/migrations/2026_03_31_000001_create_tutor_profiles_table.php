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
            
            // Directory & SEO Info
            $table->string('slug')->unique(); // e.g., /tutors/john-doe
            $table->string('headline')->nullable();
            $table->text('bio')->nullable();
            $table->string('location_state')->nullable(); // For state-specific SEO pages later
            
            // Financial & Platform Logistics
            $table->string('stripe_connect_id')->nullable(); 
            $table->boolean('is_setup_fee_paid')->default(false); // Tracks the $24.95 entry fee
            $table->boolean('is_onboarded')->default(false); // True once Stripe KYC is complete
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tutor_profiles');
    }
};