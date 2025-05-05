<?php

use App\Http\Controllers\BarangController;

Route::get('/barangs', [BarangController::class, 'index'])->name('barangs.index');
Route::get('/barangs/create', [BarangController::class, 'create'])->name('barangs.create');
Route::post('/barangs', [BarangController::class, 'store'])->name('barangs.store');
Route::get('/barangs/{id}', [BarangController::class, 'show'])->name('barangs.show');
Route::delete('/barangs/{id}', [BarangController::class, 'destroy'])->name('barangs.destroy');
