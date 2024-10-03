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


