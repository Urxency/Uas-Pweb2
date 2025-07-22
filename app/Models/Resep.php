<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Rating;
use App\Models\Kategori;

class Resep extends Model
{
    use HasFactory;

    protected $fillable = ['judul_resep', 'kategori_id', 'bahan_resep', 'durasi', 'level', 'langkah_resep', 'gambar', 'user_id'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Category
    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kategori_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function averageRating()
    {
        if (!$this->relationLoaded('ratings')) {
            $this->load('ratings');
        }

        return $this->ratings->avg('rating') ? round($this->ratings->avg('rating'), 1) : null;
    }

    // // Method untuk mendapatkan total rating
    // public function totalRatings()
    // {
    //     return $this->ratings()->count();
    // }
}
