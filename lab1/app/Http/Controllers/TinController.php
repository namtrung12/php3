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
        return '<h1>Trang tin tức</h1>';
    }

    public function lay1tin($id)
    {
        return view('chitiet', ['id' => $id]);
    }
}
