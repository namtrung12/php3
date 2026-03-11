<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinController;
use App\Http\Controllers\QttinController;
use App\Http\Controllers\NguyenVanAController;

Route::get('/', [TinController::class, 'index']);
Route::get('/lien-he', [TinController::class, 'lienHe']);
Route::get('/tin-tuc', [TinController::class, 'tinTuc']);

Route::get('/ct/{id}', [TinController::class, 'lay1tin'])->whereNumber('id');

Route::resource('qttin', QttinController::class);

Route::get('/thongtinsv', [NguyenVanAController::class, 'thongTin']);
