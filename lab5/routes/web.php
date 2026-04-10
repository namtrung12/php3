<?php

use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/tin');

Route::get('/tin', [TinController::class, 'index'])->name('tin.index');
Route::get('/tin/thung-rac', [TinController::class, 'trash'])->name('tin.trash');
Route::get('/tin/them', [TinController::class, 'create'])->name('tin.create');
Route::post('/tin/them', [TinController::class, 'store'])->name('tin.store');
Route::get('/tin/{tin}/sua', [TinController::class, 'edit'])->name('tin.edit');
Route::put('/tin/{tin}', [TinController::class, 'update'])->name('tin.update');
Route::delete('/tin/{tin}', [TinController::class, 'destroy'])->name('tin.destroy');
Route::patch('/tin/{id}/khoi-phuc', [TinController::class, 'restore'])->name('tin.restore');
Route::delete('/tin/{id}/xoa-vinh-vien', [TinController::class, 'forceDestroy'])->name('tin.forceDestroy');
