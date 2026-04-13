<?php

namespace App\Http\Requests\Labs\Lab7;

use Illuminate\Foundation\Http\FormRequest;

class RuleNhapSV extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'masv' => ['required', 'regex:/^[A-Z0-9]+$/', 'min:3', 'max:10'],
            'hoten' => ['required', 'min:3', 'max:30'],
            'tuoi' => ['required', 'integer', 'min:16', 'max:80'],
            'ngaysinh' => ['required', 'regex:/^\d{1,2}\/\d{1,2}\/\d{4}$/'],
            'cmnd' => ['required', 'digits_between:9,10'],
            'email' => ['required', 'email', 'ends_with:@fpt.edu.vn'],
        ];
    }

    public function messages(): array
    {
        return [
            'masv.required' => 'Vui lòng nhập mã sinh viên.',
            'masv.regex' => 'Mã sinh viên chỉ gồm chữ in hoa và số.',
            'hoten.required' => 'Vui lòng nhập họ tên.',
            'tuoi.required' => 'Vui lòng nhập tuổi.',
            'ngaysinh.regex' => 'Ngày sinh phải theo định dạng dd/mm/yyyy.',
            'cmnd.digits_between' => 'CMND phải có từ :min đến :max chữ số.',
            'email.ends_with' => 'Email phải có đuôi @fpt.edu.vn.',
        ];
    }

    public function attributes(): array
    {
        return [
            'masv' => 'mã sinh viên',
            'hoten' => 'họ tên',
            'tuoi' => 'tuổi',
            'ngaysinh' => 'ngày sinh',
            'cmnd' => 'CMND',
            'email' => 'email',
        ];
    }
}
