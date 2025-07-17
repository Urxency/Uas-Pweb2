<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResepController extends Controller
{
    // Tampilkan semua resep
    public function index()
    {
        $reseps = Resep::latest()->paginate(10);
        return view('resep.index', compact('reseps'));
    }

    // Form tambah resep
    public function create()
    {
        $kategori = Kategori::all();
        return view('resep.create', compact('kategori'));
    }

    // Simpan data resep baru
    public function store(Request $request)
    {
        $request->validate([
            'judul_resep'    => 'required|string|max:255',
            'kategori_id'  => 'required|exists:kategoris,id',
            'bahan_resep'    => 'required|string',
            'langkah_resep'  => 'required|string',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar', 'public');
        }

        Resep::create([
            'judul_resep'   => $request->judul_resep,
            'kategori_id'   => $request->kategori,
            'bahan_resep'   => $request->bahan_resep,
            'langkah_resep' => $request->langkah_resep,
            'gambar'        => $gambarPath,
            'user_id'       => Auth::id(), // Jika pakai auth
        ]);

        return redirect()->route('resep.index')->with('success', 'Resep berhasil ditambahkan.');
    }

    // Form edit resep
    public function edit($id)
    {
        $resep = Resep::findOrFail($id);
        $kategori = Kategori::all();

        return view('resep.edit', compact('resep', 'kategori'));
    }

    // Update resep
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_resep'    => 'required|string|max:255',
            'kategori_id'    => 'required|exists:kategoris,id',
            'bahan_resep'    => 'required|string',
            'langkah_resep'  => 'required|string',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $resep = Resep::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($resep->gambar && Storage::disk('public')->exists($resep->gambar)) {
                Storage::disk('public')->delete($resep->gambar);
            }

            $resep->gambar = $request->file('gambar')->store('gambar', 'public');
        }

        $resep->update([
            'judul_resep'   => $request->judul_resep,
            'kategori_id'   => $request->kategori_id,
            'bahan_resep'   => $request->bahan_resep,
            'langkah_resep' => $request->langkah_resep,
        ]);

        return redirect()->route('resep.index')->with('success', 'Resep berhasil diperbarui.');
    }

    // Tampilkan detail satu resep
public function show($id)
{
    $resep = Resep::with('kategori', 'user')->findOrFail($id);

    return view('resep.show', compact('resep'));
}

    // Hapus resep
    public function destroy($id)
    {
        $resep = Resep::findOrFail($id);

        if ($resep->gambar && Storage::disk('public')->exists($resep->gambar)) {
            Storage::disk('public')->delete($resep->gambar);
        }

        $resep->delete();

        return redirect()->route('resep.index')->with('success', 'Resep berhasil dihapus.');
    }
}
