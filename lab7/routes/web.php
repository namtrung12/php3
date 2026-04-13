<?php

use App\Http\Controllers\HsController;
use App\Http\Controllers\Lab6Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuanTriTinController;
use App\Http\Controllers\SvController;
use App\Mail\GuiMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', [Lab6Controller::class, 'welcome'])->name('home');

Route::get('hs', [HsController::class, 'hs'])->name('hs');
Route::post('hs', [HsController::class, 'hs_store'])->name('hs_store');

Route::get('sv', [SvController::class, 'sv'])->name('sv');
Route::post('sv', [SvController::class, 'sv_store'])->name('sv_store');

Route::get('guimail', function () {
    if (blank(config('services.mailgun.domain')) || blank(config('services.mailgun.secret'))) {
        return 'Chưa cấu hình MAILGUN_DOMAIN và MAILGUN_SECRET trong .env nên chưa gửi mail thật được.';
    }

    Mail::mailer('mailgun')->send(new GuiMail());

    return 'Đã gửi email bằng Mailgun.';
})->name('guimail');

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
