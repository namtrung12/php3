<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Lab6Controller extends Controller
{
    public function welcome(): View
    {
        return view('welcome');
    }

    public function dashboard(): View
    {
        return view('dashboard');
    }

    public function download(): View
    {
        return view('download');
    }

    public function admin(): View
    {
        return view('quantri');
    }

    public function basicAuth(): View
    {
        return view('basic-auth');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('status', 'Bạn đã thoát khỏi hệ thống.');
    }
}
