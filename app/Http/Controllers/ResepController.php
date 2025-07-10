<?php

namespace App\Http\Controllers;
use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    
use App\Models\Kategori;

class ResepController extends Controller
{
    public function index()
    {
        $resep = Resep::all();
        return view('resep.index', compact('resep'));
    }

    public function create()
    {
    $kategori = Kategori::all(); // Ambil semua kategori
    return view('resep.create', compact('kategori'));
    }

    

    public function store(Request $request)
{
    $validated = $request->validate([
        'judul_resep' => 'required|string|max:255',
        'bahan_resep' => 'required|string',
        'langkah_resep' => 'required|string',
        'kategori_id' => 'required|exists:kategoris,id',
    ]);

    Resep::create([
        'judul_resep'   => $validated['judul_resep'],
        'bahan_resep'   => $validated['bahan_resep'],
        'langkah_resep' => $validated['langkah_resep'],
        'kategori_id'   => $validated['kategori_id'],
        'user_id'       => Auth::id(),
    ]);

    return redirect()->route('resep.index')->with('success', 'Resep berhasil ditambahkan');
}



    public function edit($id)
    {
        $resep = Resep::findOrfail($id);
        $kategori = Kategori::all();
        return view('resep.edit', compact('resep','kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'judul_resep' => 'required|string|max:255',
                'bahan_resep' => 'required|string',
                'langkah_resep' => 'required|string',
                'kategori_id' => 'required|exists:kategoris,id',
            ],
            [
                'judul_resep.required' => 'Nama resep wajib diisi.',
                'bahan_resep.required' => 'bahan resep wajib diisi.',
                'langkah_resep.required' => 'langkah resep wajib diisi.',
                'kategori_id.required' => 'kategori wajib diisi.',
            ],
        );

        $resep = Resep::findOrfail($id);
        $resep->update([
            'judul_resep' => $request->judul_resep,
            'bahan_resep' => $request->bahan_resep,
            'langkah_resep' => $request->langkah_resep,
            'kategori_id' => $request->kategori_id, 
        ]);

        return redirect()->route('resep.index')->with('success', 'resep berhasil diperbarui');
    }

    public function show($id)
    {
        $resep = Resep::findOrfail($id);
        return view('resep.show', compact('resep'));
    }

    public function destroy($id)
    {
        $resep = Resep::findOrfail($id);
        $resep->delete();

        return redirect()->route('resep.index')->with('success', 'resep berhasil dihapus');
    }
}
