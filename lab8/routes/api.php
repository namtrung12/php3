<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class);
Route::apiResource('loaisanpham', LoaiSanPhamController::class);

Route::post('dangky', [AuthController::class, 'register']);
Route::post('dangnhap', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', fn (Request $request) => $request->user());
    Route::post('logout', [AuthController::class, 'logout']);
});
