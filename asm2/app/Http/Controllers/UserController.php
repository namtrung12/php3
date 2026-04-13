<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $keyword = trim((string) $request->query('keyword', ''));

        $query = User::query()->orderByDesc('id');

        if ($keyword !== '') {
            $query->where(function ($query) use ($keyword): void {
                $query
                    ->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                    ->orWhere('diachi', 'like', '%' . $keyword . '%')
                    ->orWhere('nghenghiep', 'like', '%' . $keyword . '%');
            });
        }

        $users = $query->paginate(5)->withQueryString();

        return view('users.index', compact('users', 'keyword'));
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'diachi' => ['nullable', 'string', 'max:255'],
            'idgroup' => ['required', 'integer', 'in:0,1'],
            'nghenghiep' => ['nullable', 'string', 'max:255'],
            'phai' => ['nullable', 'in:Nam,Nữ,Khác'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], $this->messages());

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'diachi' => $data['diachi'] ?? null,
            'idgroup' => (int) $data['idgroup'],
            'nghenghiep' => $data['nghenghiep'] ?? null,
            'phai' => $data['phai'] ?? null,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'Thêm user thành công.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'diachi' => ['nullable', 'string', 'max:255'],
            'idgroup' => ['required', 'integer', 'in:0,1'],
            'nghenghiep' => ['nullable', 'string', 'max:255'],
            'phai' => ['nullable', 'in:Nam,Nữ,Khác'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ], $this->messages());

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->diachi = $data['diachi'] ?? null;
        $user->idgroup = (int) $data['idgroup'];
        $user->nghenghiep = $data['nghenghiep'] ?? null;
        $user->phai = $data['phai'] ?? null;

        if (! empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'Cập nhật user thành công.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if (auth()->id() === $user->id) {
            return redirect()
                ->route('users.index')
                ->with('error', 'Không thể xóa tài khoản đang đăng nhập.');
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'Xóa user thành công.');
    }

    /**
     * @return array<string, string>
     */
    private function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên.',
            'name.max' => 'Họ tên không được vượt quá 255 ký tự.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã tồn tại.',
            'diachi.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'idgroup.required' => 'Vui lòng chọn nhóm quyền.',
            'idgroup.in' => 'Nhóm quyền không hợp lệ.',
            'nghenghiep.max' => 'Nghề nghiệp không được vượt quá 255 ký tự.',
            'phai.in' => 'Giới tính không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Nhập lại mật khẩu không khớp.',
        ];
    }
}
