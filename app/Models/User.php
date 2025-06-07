<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'role',
        'verification_token',
         'is_blocked', 
         'is_paid',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function canAccessFilament(): bool
{
    return $this->role === 'admin';  // Hanya admin yang boleh akses
}
// app/Models/User.php

public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Relasi many-to-many ke Videos melalui favorites
    public function favoriteVideos()
    {
        return $this->belongsToMany(Video::class, 'favorites');
    }

    // Helper method untuk cek apakah video sudah di-favorite
    public function hasFavorited($videoId)
    {
        return $this->favorites()->where('video_id', $videoId)->exists();
    }
     
}
