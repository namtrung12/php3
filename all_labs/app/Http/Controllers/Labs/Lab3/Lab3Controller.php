<?php

namespace App\Http\Controllers\Labs\Lab3;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Lab3Controller extends Controller
{
    public function index(): View
    {
        $loaiTin = DB::table('loaitin')->orderBy('id')->get();
        $tinMoi = DB::table('tin')->orderByDesc('ngayDang')->limit(6)->get();

        return view('labs.lab3.index', compact('loaiTin', 'tinMoi'));
    }

    public function chitiet(int $id): View
    {
        $tin = DB::table('tin')->where('id', $id)->first();

        abort_unless($tin, 404);

        return view('labs.shared.news-detail', [
            'labTitle' => 'Lab 3 - Blade Template',
            'tin' => $tin,
        ]);
    }

    public function tintrongloai(int $id): View
    {
        $loai = DB::table('loaitin')->where('id', $id)->first();
        $tin = DB::table('tin')->where('idLT', $id)->orderByDesc('ngayDang')->get();

        return view('labs.shared.news-list', [
            'labTitle' => 'Lab 3 - Tin trong loại',
            'title' => $loai->tenLoai ?? 'Loại '.$id,
            'tin' => $tin,
            'detailRoute' => 'lab3.tin.chitiet',
        ]);
    }
}
