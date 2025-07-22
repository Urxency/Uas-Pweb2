<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'resep_id',
        'rating',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Recipe
    public function resep()
    {
        return $this->belongsTo(Resep::class);
    }
}
