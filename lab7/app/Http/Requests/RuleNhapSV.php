<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleNhapSV extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
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

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'masv.required' => 'Vui lòng nhập mã sinh viên.',
            'masv.regex' => 'Mã sinh viên chỉ gồm chữ in hoa và số.',
            'masv.min' => 'Mã sinh viên phải có ít nhất :min ký tự.',
            'masv.max' => 'Mã sinh viên không được vượt quá :max ký tự.',
            'hoten.required' => 'Vui lòng nhập họ tên.',
            'hoten.min' => 'Họ tên phải có ít nhất :min ký tự.',
            'hoten.max' => 'Họ tên không được vượt quá :max ký tự.',
            'tuoi.required' => 'Vui lòng nhập tuổi.',
            'tuoi.integer' => 'Tuổi phải là số nguyên.',
            'tuoi.min' => 'Tuổi phải từ :min trở lên.',
            'tuoi.max' => 'Tuổi không được lớn hơn :max.',
            'ngaysinh.required' => 'Vui lòng nhập ngày sinh.',
            'ngaysinh.regex' => 'Ngày sinh phải theo định dạng dd/mm/yyyy.',
            'cmnd.required' => 'Vui lòng nhập CMND.',
            'cmnd.digits_between' => 'CMND phải có từ :min đến :max chữ số.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.ends_with' => 'Email phải có đuôi @fpt.edu.vn.',
        ];
    }

    /**
     * @return array<string, string>
     */
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
