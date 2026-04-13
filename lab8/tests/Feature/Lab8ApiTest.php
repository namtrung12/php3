<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Lab8ApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_api_can_create_list_show_update_and_delete_resource(): void
    {
        $createResponse = $this->postJson('/api/products', [
            'name' => 'Laptop Acer Aspire',
            'price' => 12900000,
        ]);

        $createResponse->assertCreated();
        $createResponse->assertJsonPath('status', true);
        $createResponse->assertJsonPath('data.tensp', 'Laptop Acer Aspire');
        $productId = $createResponse->json('data.id');

        $this->getJson('/api/products')
            ->assertOk()
            ->assertJsonPath('status', true)
            ->assertJsonPath('data.0.tensp', 'Laptop Acer Aspire');

        $this->getJson("/api/products/{$productId}")
            ->assertOk()
            ->assertJsonPath('message', 'Chi tiết sản phẩm')
            ->assertJsonPath('data.gia', 12900000);

        $this->putJson("/api/products/{$productId}", [
            'name' => 'Laptop Acer Aspire 5',
            'price' => 13900000,
        ])
            ->assertOk()
            ->assertJsonPath('message', 'Sản phẩm cập nhật thành công')
            ->assertJsonPath('data.tensp', 'Laptop Acer Aspire 5');

        $this->deleteJson("/api/products/{$productId}")
            ->assertOk()
            ->assertJsonPath('message', 'Sản phẩm đã được xóa');

        $this->assertDatabaseMissing('products', ['id' => $productId]);
    }

    public function test_product_api_validates_required_fields(): void
    {
        $this->postJson('/api/products', [])
            ->assertOk()
            ->assertJsonPath('status', false)
            ->assertJsonValidationErrors(['name', 'price'], 'data');
    }

    public function test_loaisanpham_api_can_create_update_and_delete_resource(): void
    {
        $createResponse = $this->postJson('/api/loaisanpham', [
            'tenloai' => 'Điện thoại',
            'mota' => 'Các dòng smartphone phổ biến.',
        ]);

        $createResponse->assertCreated();
        $createResponse->assertJsonPath('data.ten_loai', 'Điện thoại');
        $loaiSanPhamId = $createResponse->json('data.id');

        $this->getJson('/api/loaisanpham')
            ->assertOk()
            ->assertJsonPath('data.0.ten_loai', 'Điện thoại');

        $this->putJson("/api/loaisanpham/{$loaiSanPhamId}", [
            'tenloai' => 'Điện thoại thông minh',
            'mota' => 'Smartphone Android và iOS.',
        ])
            ->assertOk()
            ->assertJsonPath('message', 'Loại sản phẩm cập nhật thành công')
            ->assertJsonPath('data.ten_loai', 'Điện thoại thông minh');

        $this->deleteJson("/api/loaisanpham/{$loaiSanPhamId}")
            ->assertOk()
            ->assertJsonPath('message', 'Loại sản phẩm đã được xóa');

        $this->assertDatabaseMissing('loaisanpham', ['id' => $loaiSanPhamId]);
    }

    public function test_sanctum_auth_api_can_register_login_read_profile_and_logout(): void
    {
        $registerResponse = $this->postJson('/api/dangky', [
            'name' => 'Nguyen Van A',
            'email' => 'vana@example.com',
            'password' => 'password123',
        ]);

        $registerResponse->assertCreated();
        $registerResponse->assertJsonPath('status', true);
        $registerResponse->assertJsonStructure(['access_token', 'token_type']);

        $loginResponse = $this->postJson('/api/dangnhap', [
            'email' => 'vana@example.com',
            'password' => 'password123',
        ]);

        $loginResponse->assertOk();
        $token = $loginResponse->json('access_token');

        $this->withToken($token)
            ->getJson('/api/profile')
            ->assertOk()
            ->assertJsonPath('email', 'vana@example.com');

        $this->withToken($token)
            ->postJson('/api/logout')
            ->assertOk()
            ->assertJsonPath('message', 'Bạn đã thoát ứng dụng và token đã xóa');
    }

    public function test_product_resource_returns_friendly_field_names(): void
    {
        $product = Product::create([
            'name' => 'Chuột Logitech',
            'price' => 350000,
        ]);

        $this->getJson("/api/products/{$product->id}")
            ->assertOk()
            ->assertJsonPath('data.tensp', 'Chuột Logitech')
            ->assertJsonPath('data.gia', 350000)
            ->assertJsonMissingPath('data.name')
            ->assertJsonMissingPath('data.price');
    }
}
