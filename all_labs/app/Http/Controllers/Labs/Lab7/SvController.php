<?php

namespace App\Http\Controllers\Labs\Lab7;

use App\Http\Controllers\Controller;
use App\Http\Requests\Labs\Lab7\RuleNhapSV;
use Illuminate\View\View;

class SvController extends Controller
{
    public function sv(): View
    {
        return view('labs.lab7.nhapsv');
    }

    public function sv_store(RuleNhapSV $request): string
    {
        return 'Code xử lý lưu thông tin sinh viên';
    }
}
