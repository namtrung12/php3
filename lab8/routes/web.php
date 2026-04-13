<?php

use App\Http\Controllers\Lab6Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuanTriTinController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Lab6Controller::class, 'welcome'])->name('home');

Route::get('/dashboard', [Lab6Controller::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/download', [Lab6Controller::class, 'download'])
    ->middleware('auth')
    ->name('download');

Route::get('/quantri', [Lab6Controller::class, 'admin'])
    ->middleware(['auth', 'quantri'])
    ->name('quantri');

Route::get('/http-basic', [Lab6Controller::class, 'basicAuth'])
    ->middleware('auth.basic')
    ->name('http-basic');

Route::get('/thoat', [Lab6Controller::class, 'logout'])
    ->middleware('auth')
    ->name('thoat');

Route::get('/quantritin', [QuanTriTinController::class, 'index'])
    ->name('quantritin.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
