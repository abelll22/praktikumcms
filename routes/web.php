<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/barangs', [BarangController::class, 'index'])->name('barangs.index');
Route::get('/barangs/create', [BarangController::class, 'create'])->name('barangs.create');
Route::post('/barangs', [BarangController::class, 'store'])->name('barangs.store');
Route::get('/barangs/{id}', [BarangController::class, 'show'])->name('barangs.show');
Route::get('/barangs/{id}/edit', [BarangController::class, 'edit'])->name('barangs.edit');
Route::put('/barangs/{id}', [BarangController::class, 'update'])->name('barangs.update');
Route::get('/barangs/{id}/delete', [BarangController::class, 'delete'])->name('barangs.delete');
Route::delete('/barangs/{id}', [BarangController::class, 'destroy'])->name('barangs.destroy');