<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ResepController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TampilanController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();     

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/rating', RatingController::class);
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/users', UserController::class);
    // tambahkan route admin lainnya di sini
    Route::resource('/kategori', KategoriController::class);
});
 
// User Routes
Route::middleware(['auth'])->group(function () {
    // tambahkan route user lainnya di sini
    Route::resource('/resep', ResepController::class);
});
Route::get('/resep/create', [ResepController::class, 'create'])->name('resep.create');

route::resource('/tampilan', RatingController::class);
Route::get('/tampilan', function () {
    return view('tampilan.index');
});