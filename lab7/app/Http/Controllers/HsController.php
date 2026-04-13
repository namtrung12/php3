<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HsController extends Controller
{
    public function hs(): View
    {
        return view('nhaphs');
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
