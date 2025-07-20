<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\TampilanController;
use App\Models\Resep;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//
// ==============================
// ROUTE UMUM / PUBLIC / GUEST
// ==============================
//

Route::get('/', function () {
    $resep = Resep::latest()->take(6)->get(); // atau sesuai kebutuhanmu
    return view('home', compact('resep'));
});

Auth::routes();     

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/rating', RatingController::class);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//
// ==============================
// ROUTE ADMIN (auth + isAdmin)
// ==============================
//

Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/users', UserController::class);
    
    // tambahkan route admin lainnya di sini
    Route::resource('/kategori', KategoriController::class);
});


//
// ==============================
// ROUTE USER (auth only)
// ==============================
//

Route::middleware(['auth'])->group(function () {
    // tambahkan route user lainnya di sini
    Route::resource('/resep', ResepController::class);
    Route::get('/resep', [ResepController::class, 'index'])->name('resep.index');
    
    
    Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{id}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});


// duplikat — dibiarkan sesuai permintaan
Route::get('/resep/create', [ResepController::class, 'create'])->name('resep.create');



