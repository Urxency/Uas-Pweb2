<?php

namespace App\Http\Controllers;
use App\Models\Resep;
use Illuminate\Http\Request;
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
        $kategori = Kategori::all();
        return view('resep.create', compact('kategori'));
        
    }
    

    public function store(Request $request)
{
    $validated = $request->validate([
        'judul_resep' => 'required|string|max:255',
        'bahan_resep' => 'required|string|max:255',
        'langkah_resep' => 'required|string|max:255',
        'kategori_id' => 'required|exists:kategoris,id',
    ]);

    Resep::create([
        'judul_resep'   => $validated['judul_resep'],
        'bahan_resep'   => $validated['bahan_resep'],
        'langkah_resep' => $validated['langkah_resep'],
        'kategori_id'   => $validated['kategori_id'],
        // 'user_id'       => auth()->id(),
    ]);

    return redirect()->route('resep.index')->with('success', 'Resep berhasil ditambahkan');
}



    public function edit($id)
    {
        $resep = Resep::findOrfail($id);
        return view('resep.edit', compact('resep'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'judul_resep' => 'required|string|max:255',
                'bahan_resep' => 'required|string|max:255',
                'langkah_resep' => 'required|string|max:255',
            ],
            [
                'judul_resep.required' => 'Nama resep wajib diisi.',
                'bahan_resep.required' => 'bahan resep wajib diisi.',
                'langkah_resep.required' => 'langkah resep wajib diisi.',
            ],
        );

        $resep = Resep::findOrfail($id);
        $resep->update($request->all());
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
