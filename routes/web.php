<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/buku', [App\Http\Controllers\BukuController::class, 'index'])->name('buku.index');
// Route::get('/buku/create', [App\Http\Controllers\BukuController::class, 'create'])->name('buku.create');
// Route::post('/buku', [App\Http\Controllers\BukuController::class, 'store'])->name('buku.store');
// Route::get('/buku/edit/{id}', [App\Http\Controllers\BukuController::class, 'edit'])->name('buku.edit');
// Route::put('/buku/{id}', [App\Http\Controllers\BukuController::class, 'update'])->name('buku.update');
// Route::delete('/buku/{id}', [App\Http\Controllers\BukuController::class, 'destroy'])->name('buku.destroy');

//BUKU
use App\Http\Controllers\BukuController;
Route::resource('buku', BukuController::class);

// KATEGORI
use App\Http\Controllers\KategoriController;
Route::resource('kategori', KategoriController::class);

use App\Http\Controllers\ProfileController;
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/create', [App\Http\Controllers\ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
Route::get('profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
// Route::delete('/buku/{id}', [App\Http\Controllers\BukuController::class, 'destroy'])->name('buku.destroy');

use App\Http\Controllers\HobbyController;
Route::get('/hobby', [App\Http\Controllers\HobbyController::class, 'index'])->name('hobby.index');
Route::get('/hobby/create', [App\Http\Controllers\HobbyController::class, 'create'])->name('hobby.create');
Route::post('/hobby', [App\Http\Controllers\HobbyController::class, 'store'])->name('hobby.store');
Route::get('/hobby/edit/{id}', [HobbyController::class, 'edit'])->name('hobby.edit');
Route::put('/hobby/{id}', [App\Http\Controllers\HobbyController::class, 'update'])->name('hobby.update');
Route::delete('/hobby/{id}', [App\Http\Controllers\HobbyController::class, 'destroy'])->name('hobby.destroy');



