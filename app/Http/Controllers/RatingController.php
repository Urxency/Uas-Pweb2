<?php 
namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\Resep;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function index()
    {
        return view('resep.index');
    }

    public function store(Request $request, Resep $resep)
    {
        $validated = $request->validate([
            'nilai' => 'required|integer|min:1|max:5',
        ]);

        Rating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'resep_id' => $resep->id,
            ],
            [
                'rating' => $validated['nilai']
            ]
        );

        return redirect()->back()->with('success', 'Rating berhasil disimpan!');
    }
}
