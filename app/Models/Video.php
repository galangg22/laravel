<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'thumbnail_path', 'category_id', 'video_url']; // Kolom yang bisa diisi

    // Relasi: Satu video milik satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi: Satu video bisa punya banyak part
    public function videoParts()
    {
        return $this->hasMany(VideoPart::class);
    }
     // Relasi ke Favorites
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Relasi many-to-many ke Users melalui favorites
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    // Helper method untuk hitung total favorites
    public function favoritesCount()
    {
        return $this->favorites()->count();
    }

    // Helper method untuk cek apakah user sudah favorite video ini
    public function isFavoritedBy($userId)
    {
        return $this->favorites()->where('user_id', $userId)->exists();
    }
}
