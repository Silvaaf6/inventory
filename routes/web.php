<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// KATEGORI
Route::resource('kategori', KategoriController::class);
Route::resource('buku', BukuController::class);
// Route::resource('profile', ProfileController::class);

// BUKU
// use App\Http\Controllers\BukuController;
// Route::get('/buku', [App\Http\Controllers\BukuController::class, 'index'])->name('buku.index');
// Route::get('/buku/create', [App\Http\Controllers\BukuController::class, 'create'])->name('buku.create');
// Route::post('/buku', [App\Http\Controllers\BukuController::class, 'store'])->name('buku.store');
// Route::get('/buku/edit/{id}', [App\Http\Controllers\BukuController::class, 'edit'])->name('buku.edit');
// Route::put('/buku/{id}', [App\Http\Controllers\BukuController::class, 'update'])->name('buku.update');
// Route::delete('/buku/{id}', [App\Http\Controllers\BukuController::class, 'destroy'])->name('buku.destroy');

// PROFILE
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');
Route::get('profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');

// HOBI
Route::get('hobi', [HobiController::class, 'index'])->name('hobi.index');
Route::get('hobi/create', [HobiController::class, 'create'])->name('hobi.create');
Route::post('hobi', [HobiController::class, 'store'])->name('hobi.store');
Route::get('hobi/edit/{id}', [HobiController::class, 'edit'])->name('hobi.edit');
Route::put('hobi/{id}', [HobiController::class, 'update'])->name('hobi.update');
Route::delete('hobi/{id}', [HobiController::class, 'destroy'])->name('hobi.destroy');

Route::put('password/update', [PasswordController::class, 'update'])->name('password.update1');
Route::get('password/edit', [PasswordController::class, 'edit'])->name('password.edit');

