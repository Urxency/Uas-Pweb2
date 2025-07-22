<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Resep;


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\TampilanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;


//route untuk guest

Route::get('/', function () {
    $resep = Resep::latest()->take(6)->get();
    return view('home', compact('resep'));
});

Route::get('/search', [HomeController::class, 'search'])->name('search');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


// route untuk user

Route::middleware(['auth'])->group(function () {
    // Resep
    Route::resource('/resep', ResepController::class)->except(['create']);
    Route::get('/resep/create', [ResepController::class, 'create'])->name('resep.create'); // jika ingin terpisah

    // Rating
    Route::post('/resep/{resep}/rate', [ResepController::class, 'rate'])->name('resep.rate');

    // Profile
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
});


//route untuk admin

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/users', UserController::class);
    Route::resource('/kategori', KategoriController::class);
});
