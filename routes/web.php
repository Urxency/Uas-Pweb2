<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ResepController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();     

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    

Route::resource('/kategori', KategoriController::class);

Route::resource('/resep', ResepController::class);

route::resource('/rating', RatingController::class);


Route::get('/resep/create', [ResepController::class, 'create'])->name('resep.create');