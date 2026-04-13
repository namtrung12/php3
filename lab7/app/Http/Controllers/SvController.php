<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleNhapSV;
use Illuminate\View\View;

class SvController extends Controller
{
    public function sv(): View
    {
        return view('nhapsv');
    }

    public function sv_store(RuleNhapSV $request): string
    {
        return 'Code xử lý lưu thông tin sinh viên';
    }
}
