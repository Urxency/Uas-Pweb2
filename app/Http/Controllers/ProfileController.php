<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id); // cari user berdasarkan ID, jika tidak ditemukan akan 404
        return view('profile.show', compact('user'));
    }

    public function edit($id)
{
    $user = User::findOrFail($id);
    
    // Tambahkan pengecekan agar user hanya bisa edit dirinya sendiri
    if (auth()->id() != $user->id) {
        abort(403);
    }

    return view('profile.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Tambahkan pengecekan agar user hanya bisa update dirinya sendiri
    if (auth()->id() != $user->id) {
        abort(403);
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    $user->name = $validated['name'];
    $user->email = $validated['email'];

    if (!empty($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }

    $user->save();

    return redirect()->route('profile.show', $user->id)->with('success', 'Profil berhasil diperbarui.');
}
}
