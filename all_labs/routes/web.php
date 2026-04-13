<?php

use App\Http\Controllers\Labs\Lab1\Lab1Controller;
use App\Http\Controllers\Labs\Lab2\Lab2Controller;
use App\Http\Controllers\Labs\Lab3\Lab3Controller;
use App\Http\Controllers\Labs\Lab4\Lab4Controller;
use App\Http\Controllers\Labs\Lab5\TinController as Lab5TinController;
use App\Http\Controllers\Labs\Lab7\HsController;
use App\Http\Controllers\Labs\Lab7\SvController;
use App\Http\Controllers\Labs\PortalController;
use App\Mail\Labs\Lab7\GuiMail;
use App\Http\Controllers\Lab6Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuanTriTinController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortalController::class, 'index'])->name('home');

Route::prefix('lab1')->name('lab1.')->group(function () {
    Route::get('/', [Lab1Controller::class, 'index'])->name('home');
    Route::get('lien-he', [Lab1Controller::class, 'lienHe'])->name('lienhe');
    Route::get('tin-tuc', [Lab1Controller::class, 'tinTuc'])->name('tintuc');
    Route::get('ct/{id}', [Lab1Controller::class, 'lay1tin'])->whereNumber('id')->name('chitiet');
    Route::get('thongtinsv', [Lab1Controller::class, 'thongTin'])->name('thongtinsv');
});

Route::prefix('lab2')->name('lab2.')->group(function () {
    Route::get('/', [Lab2Controller::class, 'index'])->name('home');
    Route::get('xemnhieu', [Lab2Controller::class, 'xemNhieu'])->name('xemnhieu');
    Route::get('tinmoi', [Lab2Controller::class, 'tinMoi'])->name('tinmoi');
    Route::get('tintrongloai/{id}', [Lab2Controller::class, 'tinTrongLoai'])->whereNumber('id')->name('tintrongloai');
    Route::get('tin/{id}', [Lab2Controller::class, 'chiTietTin'])->whereNumber('id')->name('tin');
});

Route::prefix('lab3')->name('lab3.')->group(function () {
    Route::get('/', [Lab3Controller::class, 'index'])->name('home');
    Route::get('tin/{id}', [Lab3Controller::class, 'chitiet'])->whereNumber('id')->name('tin.chitiet');
    Route::get('cat/{id}', [Lab3Controller::class, 'tintrongloai'])->whereNumber('id')->name('tin.trongloai');
});

Route::prefix('lab4')->name('lab4.')->group(function () {
    Route::get('/', [Lab4Controller::class, 'index'])->name('home');
    Route::get('tin/{id}', [Lab4Controller::class, 'chitiet'])->whereNumber('id')->name('tin.chitiet');
    Route::get('cat/{id}', [Lab4Controller::class, 'tintrongloai'])->whereNumber('id')->name('tin.trongloai');
});

Route::prefix('lab5')->name('lab5.')->group(function () {
    Route::redirect('/', '/lab5/tin')->name('home');
    Route::get('tin', [Lab5TinController::class, 'index'])->name('tin.index');
    Route::get('tin/thung-rac', [Lab5TinController::class, 'trash'])->name('tin.trash');
    Route::get('tin/them', [Lab5TinController::class, 'create'])->name('tin.create');
    Route::post('tin/them', [Lab5TinController::class, 'store'])->name('tin.store');
    Route::get('tin/{tin}/sua', [Lab5TinController::class, 'edit'])->name('tin.edit');
    Route::put('tin/{tin}', [Lab5TinController::class, 'update'])->name('tin.update');
    Route::delete('tin/{tin}', [Lab5TinController::class, 'destroy'])->name('tin.destroy');
    Route::patch('tin/{id}/khoi-phuc', [Lab5TinController::class, 'restore'])->name('tin.restore');
    Route::delete('tin/{id}/xoa-vinh-vien', [Lab5TinController::class, 'forceDestroy'])->name('tin.forceDestroy');
});

Route::get('/lab6', [Lab6Controller::class, 'welcome'])->name('lab6.home');

Route::get('/lab6/dashboard', [Lab6Controller::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/lab6/download', [Lab6Controller::class, 'download'])
    ->middleware('auth')
    ->name('download');

Route::get('/lab6/quantri', [Lab6Controller::class, 'admin'])
    ->middleware(['auth', 'quantri'])
    ->name('quantri');

Route::get('/lab6/http-basic', [Lab6Controller::class, 'basicAuth'])
    ->middleware('auth.basic')
    ->name('http-basic');

Route::get('/lab6/thoat', [Lab6Controller::class, 'logout'])
    ->middleware('auth')
    ->name('thoat');

Route::get('/lab6/quantritin', [QuanTriTinController::class, 'index'])
    ->name('quantritin.index');

Route::middleware('auth')->group(function () {
    Route::get('/lab6/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/lab6/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/lab6/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/download', [Lab6Controller::class, 'download'])->middleware('auth');
Route::get('/quantri', [Lab6Controller::class, 'admin'])->middleware(['auth', 'quantri']);

Route::prefix('lab7')->name('lab7.')->group(function () {
    Route::get('/', fn () => view('labs.lab7.index'))->name('home');
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
});

Route::get('/lab8', fn () => view('labs.lab8.index'))->name('lab8.home');

require __DIR__.'/auth.php';
