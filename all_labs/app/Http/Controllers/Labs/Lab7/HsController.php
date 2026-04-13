<?php

namespace App\Http\Controllers\Labs\Lab7;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HsController extends Controller
{
    public function hs(): View
    {
        return view('labs.lab7.nhaphs');
    }

    public function hs_store(Request $request): string
    {
        $request->validate([
            'hoten' => ['required', 'min:3', 'max:20'],
            'tuoi' => ['required', 'integer', 'min:16', 'max:100'],
            'ngaysinh' => ['required', 'date'],
        ]);

        return 'Code xử lý lưu thông tin học sinh';
    }
}
