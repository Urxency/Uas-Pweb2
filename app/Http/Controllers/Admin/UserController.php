<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $users = User::with('role')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->load('role');
        return view('users.show', compact('user'));
    }

    public function create(Role $role)
    {
        $role = Role::all();
        return view('users.create', compact('role'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'password' => ['required', 'max:255', 'regex:/^[a-zA-Z0-9!@#$%^&*()_+=\-{}\[\]:;"\'<>,.?\/\\|~`]+$/'],
                'role_id' => 'required|exists:roles,id',
            ],
            [
                'name.required' => 'Isi nama dengan benar!',
                'email' => 'Isi email dengan benar',
                'password.required' => 'Password wajib diisi!',
                'password.regex' => 'Password hanya boleh mengandung huruf, angka dan simbol tertentu!',
                'role_id.exists' => 'Pilih role dengan benar!',
            ],
        );

        $users = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $validated['role_id'],
        ]);

        return redirect()->route('users.index')->with('success', 'Data User berhasil ditambahkan :D.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role_id' => 'required|exists:roles,id',
            'password' => 'nullable|string|min:6',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role_id = $validated['role_id'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('users.show', $user->id)->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Tidak dapat menghapus akun sendiri');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
