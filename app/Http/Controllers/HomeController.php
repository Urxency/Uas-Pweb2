<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'search']);
    }

    // Halaman utama (home)
    public function index()
    {
        $resep = Resep::latest()->take(6)->get(); // Ambil 6 resep terbaru
        return view('home', compact('resep'));
    }

    // Halaman hasil pencarian
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $resep = Resep::where('judul_resep', 'like', "%$keyword%")
                    ->orWhere('bahan_resep', 'like', "%$keyword%")
                    ->orWhere('langkah_resep', 'like', "%$keyword%")
                    ->get();

        return view('home', compact('resep', 'keyword'));
    }

    public function produk()
    {
        return "ini contoh untuk halaman produk";
    }
}