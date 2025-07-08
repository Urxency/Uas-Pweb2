<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Resep;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate(
            [
                'nama_kategori' => 'required|string|max:255',
                
            ],
            [
                'nama_kategori.required' => 'Nama kategori wajib diisi.',
            ],
        );
        kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrfail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama_kategori' => 'required|max:255',
            ],
            [
                'nama_kategori.required' => 'Nama kategori wajib diisi.',
            ],
        );

        $kategori = Kategori::findOrfail($id);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'kategori berhasil diperbarui');
    }

    public function show($id)
    {
        $kategori = Kategori::findOrfail($id);
        return view('kategori.show', compact('kategori'));
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrfail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'kategori berhasil dihapus');
    }
}
