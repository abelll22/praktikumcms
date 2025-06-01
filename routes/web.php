<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;


Route::get('/barangs', [BarangController::class, 'index'])->name('barangs.index');
Route::get('/barangs/create', [BarangController::class, 'create'])->name('barangs.create');
Route::post('/barangs', [BarangController::class, 'store'])->name('barangs.store');
Route::get('/barangs/{id}', [BarangController::class, 'show'])->name('barangs.show');
Route::delete('/barangs/{id}', [BarangController::class, 'destroy'])->name('barangs.destroy');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/transaksis', [TransaksiController::class, 'index'])->name('transaksis.index');
Route::get('/transaksis/create', [TransaksiController::class, 'create'])->name('transaksis.create');
Route::post('/transaksis', [TransaksiController::class, 'store'])->name('transaksis.store');
Route::resource('transaksis', TransaksiController::class);
