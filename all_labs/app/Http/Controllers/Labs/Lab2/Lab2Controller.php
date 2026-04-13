<?php

namespace App\Http\Controllers\Labs\Lab2;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Lab2Controller extends Controller
{
    public function index(): View
    {
        return view('labs.lab2.index');
    }

    public function xemNhieu(): View
    {
        $tin = DB::table('tin')->orderByDesc('xem')->limit(10)->get();

        return view('labs.lab2.list', [
            'title' => '10 tin xem nhiều nhất',
            'tin' => $tin,
            'detailRoute' => 'lab2.tin',
        ]);
    }

    public function tinMoi(): View
    {
        $tin = DB::table('tin')->orderByDesc('ngayDang')->limit(10)->get();

        return view('labs.lab2.list', [
            'title' => '10 tin mới nhất',
            'tin' => $tin,
            'detailRoute' => 'lab2.tin',
        ]);
    }

    public function tinTrongLoai(int $id): View
    {
        $loai = DB::table('loaitin')->where('id', $id)->first();
        $tin = DB::table('tin')->where('idLT', $id)->orderByDesc('ngayDang')->get();

        return view('labs.lab2.list', [
            'title' => 'Tin trong loại: '.($loai->tenLoai ?? 'Loại '.$id),
            'tin' => $tin,
            'detailRoute' => 'lab2.tin',
        ]);
    }

    public function chiTietTin(int $id): View
    {
        $tin = DB::table('tin')->where('id', $id)->first();

        abort_unless($tin, 404);

        return view('labs.shared.news-detail', [
            'labTitle' => 'Lab 2 - Chi tiết tin',
            'tin' => $tin,
        ]);
    }
}
