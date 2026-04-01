<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'slug',
        'is_onboarded',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_onboarded' => 'boolean',
        ];
    }

    // --- Relationships ---

    /**
     * Link to the "Full Meal Deal" Marketplace Profile
     */
    public function profile(): HasOne
    {
        return $this->hasOne(TutorProfile::class);
    }

    // --- Media Collections (Spatie) ---

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile()
            ->useFallbackUrl('/images/default-avatar.png');

        $this->addMediaCollection('intro_video')
            ->singleFile();

        $this->addMediaCollection('certifications');
    }

    // --- Helpers ---

    public function isTutor(): bool
    {
        return $this->role === 'tutor';
    }

    public function isParent(): bool
    {
        return $this->role === 'parent';
    }
}