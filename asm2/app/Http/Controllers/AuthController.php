<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        $remember = $request->boolean('remember');

        if (! Auth::attempt($credentials, $remember)) {
            return back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
        }

        $request->session()->regenerate();

        $redirectRoute = (int) Auth::user()->idgroup === 1
            ? 'categories.index'
            : 'home';

        return redirect()->intended(route($redirectRoute));
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'diachi' => ['nullable', 'string', 'max:255'],
            'nghenghiep' => ['nullable', 'string', 'max:255'],
            'phai' => ['nullable', 'in:Nam,Nữ,Khác'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'name.max' => 'Họ tên không được vượt quá 255 ký tự.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã tồn tại.',
            'diachi.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'nghenghiep.max' => 'Nghề nghiệp không được vượt quá 255 ký tự.',
            'phai.in' => 'Giới tính không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Nhập lại mật khẩu không khớp.',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'diachi' => $data['diachi'] ?? null,
            'idgroup' => 0,
            'nghenghiep' => $data['nghenghiep'] ?? null,
            'phai' => $data['phai'] ?? null,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->route('home')
            ->with('success', 'Đăng ký tài khoản thành công.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'Đăng xuất thành công.');
    }
}
