<?php

namespace App\Http\Controllers\Labs\Lab1;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class Lab1Controller extends Controller
{
    public function index(): View
    {
        return view('labs.lab1.index');
    }

    public function lienHe(): View
    {
        return view('labs.lab1.lienhe');
    }

    public function tinTuc(): View
    {
        $posts = [
            ['id' => 1, 'title' => 'Laravel route cơ bản', 'excerpt' => 'Thực hành route, controller và view.'],
            ['id' => 2, 'title' => 'Blade template đầu tiên', 'excerpt' => 'Tách layout và nội dung bằng Blade.'],
            ['id' => 3, 'title' => 'Truyền tham số qua route', 'excerpt' => 'Nhận id từ URL và hiển thị ra view.'],
        ];

        return view('labs.lab1.tintuc', compact('posts'));
    }

    public function lay1tin(int $id): View
    {
        return view('labs.lab1.chitiet', compact('id'));
    }

    public function thongTin(): View
    {
        return view('labs.lab1.thongtinsv');
    }
}
