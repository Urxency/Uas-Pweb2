<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\Resep;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, Resep $recipe)
    {
        $validated = $request->validate([
            'nilai' => 'required|integer|min:1|max:5',
        ]);

        $rating = Rating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'recipe_id' => $recipe->id,
            ],
            [
                'nilai' => $validated['nilai']
            ]
        );

        return redirect()->back()
            ->with('success', 'Rating berhasil disimpan!');
    }
}
