<?php
 
namespace App\Http\Controllers;

 
use Illuminate\Http\Request;
use App\Models\Resep;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $resep = Resep::latest()->take(6)->get(); // ambil 6 resep terbaru, bisa disesuaikan
    return view('home', compact('resep'));
    }
    public function produk() {
        return "ini contoh untuk halaman produk";
    }
}