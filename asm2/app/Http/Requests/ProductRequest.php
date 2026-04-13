<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $imageRequiredRule = $this->isMethod('post') ? 'required' : 'nullable';

        return [
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => [$imageRequiredRule, 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
            'describe' => 'required|string|max:1000',
            'category_id' => 'required|integer|exists:categories,id',
            'status' => 'required|boolean',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Ten san pham khong duoc de trong.',
            'name.max' => 'Ten san pham khong duoc vuot qua 255 ky tu.',
            'price.required' => 'Gia san pham khong duoc de trong.',
            'price.integer' => 'Gia san pham phai la so nguyen.',
            'price.min' => 'Gia san pham khong duoc nho hon 0.',
            'quantity.required' => 'So luong khong duoc de trong.',
            'quantity.integer' => 'So luong phai la so nguyen.',
            'quantity.min' => 'So luong khong duoc nho hon 0.',
            'image.required' => 'Hinh anh khong duoc de trong.',
            'image.image' => 'File tai len phai la hinh anh.',
            'image.mimes' => 'Hinh anh chi ho tro: jpg, jpeg, png, gif, webp.',
            'image.max' => 'Dung luong hinh anh khong duoc vuot qua 2MB.',
            'describe.required' => 'Mo ta khong duoc de trong.',
            'describe.max' => 'Mo ta khong duoc vuot qua 1000 ky tu.',
            'category_id.required' => 'Vui long chon danh muc.',
            'category_id.exists' => 'Danh muc da chon khong hop le.',
            'status.required' => 'Trang thai khong duoc de trong.',
            'status.boolean' => 'Trang thai khong hop le.',
        ];
    }
}
