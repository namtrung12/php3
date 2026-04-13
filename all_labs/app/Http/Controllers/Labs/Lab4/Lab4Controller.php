<?php

namespace App\Http\Controllers\Labs\Lab4;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Lab4Controller extends Controller
{
    public function index(): View
    {
        return view('labs.lab4.index', [
            'loaiTinCount' => DB::table('loaitin')->count(),
            'tinCount' => DB::table('tin')->count(),
            'productCount' => DB::table('products')->count(),
            'loaiSanPhamCount' => DB::table('loaisanpham')->count(),
        ]);
    }

    public function chitiet(int $id): View
    {
        $tin = DB::table('tin')->where('id', $id)->first();

        abort_unless($tin, 404);

        return view('labs.shared.news-detail', [
            'labTitle' => 'Lab 4 - Migration & Seeder',
            'tin' => $tin,
        ]);
    }

    public function tintrongloai(int $id): View
    {
        $loai = DB::table('loaitin')->where('id', $id)->first();
        $tin = DB::table('tin')->where('idLT', $id)->orderByDesc('ngayDang')->get();

        return view('labs.shared.news-list', [
            'labTitle' => 'Lab 4 - Dữ liệu seed theo loại',
            'title' => $loai->tenLoai ?? 'Loại '.$id,
            'tin' => $tin,
            'detailRoute' => 'lab4.tin.chitiet',
        ]);
    }
}
