<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResepController extends Controller
{
    // Tampilkan semua resep
    public function index(Request $request)
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
            'kategori_id'    => 'required|exists:kategoris,id',
            'level'         => 'required|string|max:100',
            'durasi'         => 'required|string|max:100',
            'bahan_resep'    => 'required|string',
            'langkah_resep'  => 'required|string',
            'gambar'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $filename = Str::uuid() . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('gambar', $filename, 'public');

        Resep::create([
            'judul_resep'   => $request->judul_resep,
            'kategori_id'   => $request->kategori_id,
            'level'        => $request->level,
            'durasi'        => $request->durasi,
            'bahan_resep'   => $request->bahan_resep,
            'langkah_resep' => $request->langkah_resep,
            'gambar'        => $filename,
            'user_id'       => Auth::id(),
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
            'level'         => 'required|string|max:100',
            'bahan_resep'    => 'required|string',
            'durasi'         => 'required|string|max:100',
            'langkah_resep'  => 'required|string',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $resep = Resep::findOrFail($id);

        // Update gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            if ($resep->gambar && Storage::disk('public')->exists('gambar/' . $resep->gambar)) {
                Storage::disk('public')->delete('gambar/' . $resep->gambar);
            }

            $gambar = $request->file('gambar');
            $filename = Str::uuid() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('gambar', $filename, 'public');
            $resep->gambar = $filename;
        }

        $resep->update([
            'judul_resep'   => $request->judul_resep,
            'kategori_id'   => $request->kategori_id,
            'level'        => $request->level,
            'bahan_resep'   => $request->bahan_resep,
            'durasi'        => $request->durasi,
            'langkah_resep' => $request->langkah_resep,
            'gambar'        => $resep->gambar, // tetap simpan gambar jika tidak diganti
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

        if ($resep->gambar && Storage::disk('public')->exists('gambar/' . $resep->gambar)) {
            Storage::disk('public')->delete('gambar/' . $resep->gambar);
        }

        $resep->delete();

        return redirect()->route('resep.index')->with('success', 'Resep berhasil dihapus.');
    }

    public function search(Request $request)
{
    $keyword = $request->q;

    $reseps = Resep::where('judul_resep', 'like', "%$keyword%")
        ->orWhere('bahan_resep', 'like', "%$keyword%")
        ->orWhere('langkah_resep', 'like', "%$keyword%")
        ->latest()
        ->paginate(10);

    return view('resep.hasil', compact('reseps', 'keyword'));
}
}