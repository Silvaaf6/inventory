<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// BUKU
use App\Http\Controllers\BukuController;
Route::get('/buku', [App\Http\Controllers\BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/create', [App\Http\Controllers\BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [App\Http\Controllers\BukuController::class, 'store'])->name('buku.store');
Route::get('/buku/edit/{id}', [App\Http\Controllers\BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [App\Http\Controllers\BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/{id}', [App\Http\Controllers\BukuController::class, 'destroy'])->name('buku.destroy');

// KATEGORI
use App\Http\Controllers\KategoriController;
Route::resource('kategori', KategoriController::class);

// PROFILE
use App\Http\Controllers\ProfileController;
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/create', [App\Http\Controllers\ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
Route::get('profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

// HOBI
use App\Http\Controllers\HobiController;
Route::get('/hobi', [App\Http\Controllers\HobiController::class, 'index'])->name('hobi.index');
Route::get('/hobi/create', [App\Http\Controllers\HobiController::class, 'create'])->name('hobi.create');
Route::post('/hobi', [App\Http\Controllers\HobiController::class, 'store'])->name('hobi.store');
Route::get('/hobi/edit/{id}', [HobiController::class, 'edit'])->name('hobi.edit');
Route::put('/hobi/{id}', [App\Http\Controllers\HobiController::class, 'update'])->name('hobi.update');
Route::delete('/hobi/{id}', [App\Http\Controllers\HobiController::class, 'destroy'])->name('hobi.destroy');

use App\Http\Controllers\Auth\PasswordController;
Route::put('/password/update', [PasswordController::class, 'update'])->name('password.update1');
Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');


