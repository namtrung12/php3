<?php

namespace App\Http\Controllers\Labs;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PortalController extends Controller
{
    public function index(): View
    {
        $labs = [
            ['number' => 1, 'title' => 'Cơ bản về Laravel', 'url' => route('lab1.home')],
            ['number' => 2, 'title' => 'Sử dụng Query Builder', 'url' => route('lab2.home')],
            ['number' => 3, 'title' => 'Blade Template', 'url' => route('lab3.home')],
            ['number' => 4, 'title' => 'Migration & Seeder', 'url' => route('lab4.home')],
            ['number' => 5, 'title' => 'Eloquent ORM', 'url' => route('lab5.home')],
            ['number' => 6, 'title' => 'Authentication & Middleware', 'url' => route('lab6.home')],
            ['number' => 7, 'title' => 'Validation & Send Mail', 'url' => route('lab7.home')],
            ['number' => 8, 'title' => 'RESTful API', 'url' => route('lab8.home')],
        ];

        return view('labs.portal', compact('labs'));
    }
}
