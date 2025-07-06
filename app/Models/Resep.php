<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Rating;
use App\Models\Kategori;

class Resep extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'kategori_id', 'judul', 'bahan', 'langkah'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Category
    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }

    // Relasi ke Rating
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // Method untuk mendapatkan rata-rata rating
    public function averageRating()
    {
        return $this->ratings()->avg('nilai');
    }

    // Method untuk mendapatkan total rating
    public function totalRatings()
    {
        return $this->ratings()->count();
    }
}
