<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function lienHe()
    {
        return view('lienhe');
    }

    public function tinTuc()
    {
        $posts = [
            ['id' => 1, 'title' => 'Laravel 9 – Bước đầu làm quen', 'excerpt' => 'Giới thiệu về route, controller, view và artisan.'],
            ['id' => 2, 'title' => 'Cài đặt môi trường PHP 8', 'excerpt' => 'Hướng dẫn kiểm tra và cài đặt XAMPP + Composer.'],
            ['id' => 3, 'title' => 'Blade template cơ bản', 'excerpt' => 'Cách kế thừa layout và tạo partial đơn giản.'],
        ];
        return view('tin', compact('posts'));
    }

    public function lay1tin($id)
    {
        return view('chitiet', ['id' => $id]);
    }
}
