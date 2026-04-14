<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_home_page(): void
    {
        $category = Category::create([
            'name' => 'Điện thoại',
            'status' => 1,
        ]);

        Product::create([
            'name' => 'iPhone 15',
            'price' => 25000000,
            'quantity' => 5,
            'image' => 'uploads/products/iphone-15.jpg',
            'describe' => 'Điện thoại dành cho trang chủ người dùng.',
            'category_id' => $category->id,
            'status' => 1,
        ]);

        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('Danh mục và sản phẩm')
            ->assertSee('Điện thoại')
            ->assertSee('iPhone 15');
    }

    public function test_guest_is_redirected_to_login_when_accessing_admin_categories(): void
    {
        $response = $this->get('/categories');

        $response->assertRedirect('/login');
    }

    public function test_guest_is_redirected_to_login_when_viewing_product_detail(): void
    {
        $category = Category::create([
            'name' => 'Laptop',
            'status' => 1,
        ]);

        $product = Product::create([
            'name' => 'MacBook',
            'price' => 32000000,
            'quantity' => 3,
            'image' => 'uploads/products/macbook.jpg',
            'describe' => 'Chi tiết sản phẩm cần đăng nhập để xem.',
            'category_id' => $category->id,
            'status' => 1,
        ]);

        $response = $this->get(route('client.products.show', $product, false));

        $response->assertRedirect('/login');
    }

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_register_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response
            ->assertStatus(200)
            ->assertSee('Đăng ký ASM2');
    }

    public function test_user_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'User Moi',
            'email' => 'usermoi@example.com',
            'diachi' => 'Ha Noi',
            'nghenghiep' => 'Sinh viên',
            'phai' => 'Nam',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ]);

        $user = User::where('email', 'usermoi@example.com')->firstOrFail();

        $this->assertAuthenticatedAs($user);
        $this->assertSame(0, $user->idgroup);
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('home', absolute: false));
    }

    public function test_normal_user_can_login_and_logout(): void
    {
        $user = User::factory()->create([
            'email' => 'lehanam3570@gmail.com',
            'password' => 'namtrung12',
            'idgroup' => 0,
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'namtrung12',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('home', absolute: false));

        $logoutResponse = $this->post('/logout');

        $this->assertGuest();
        $logoutResponse->assertRedirect(route('home', absolute: false));
    }

    public function test_admin_login_redirects_to_categories(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => 'secret123',
            'idgroup' => 1,
        ]);

        $response = $this->post('/login', [
            'email' => $admin->email,
            'password' => 'secret123',
        ]);

        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect(route('categories.index', absolute: false));
    }

    public function test_authenticated_user_can_view_product_detail(): void
    {
        $user = User::factory()->create([
            'idgroup' => 0,
        ]);

        $category = Category::create([
            'name' => 'Tablet',
            'status' => 1,
        ]);

        $product = Product::create([
            'name' => 'iPad',
            'price' => 15000000,
            'quantity' => 7,
            'image' => 'uploads/products/ipad.jpg',
            'describe' => 'Mô tả iPad',
            'category_id' => $category->id,
            'status' => 1,
        ]);

        $response = $this
            ->actingAs($user)
            ->get(route('client.products.show', $product, false));

        $response
            ->assertOk()
            ->assertSee('Chi tiết sản phẩm')
            ->assertSee('iPad');
    }

    public function test_admin_can_view_users_page(): void
    {
        $user = User::factory()->create([
            'idgroup' => 1,
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/users');

        $response
            ->assertOk()
            ->assertSee('Quản lý user')
            ->assertSee($user->email);
    }

    public function test_admin_can_create_update_and_delete_user(): void
    {
        $admin = User::factory()->create([
            'idgroup' => 1,
        ]);

        $createResponse = $this
            ->actingAs($admin)
            ->post('/users', [
                'name' => 'Nguyen Van A',
                'email' => 'nguyenvana@example.com',
                'diachi' => 'TPHCM',
                'idgroup' => 0,
                'nghenghiep' => 'Developer',
                'phai' => 'Nam',
                'password' => 'secret123',
                'password_confirmation' => 'secret123',
            ]);

        $createResponse
            ->assertSessionHasNoErrors()
            ->assertRedirect('/users');

        $createdUser = User::where('email', 'nguyenvana@example.com')->firstOrFail();

        $updateResponse = $this
            ->actingAs($admin)
            ->put('/users/' . $createdUser->id, [
                'name' => 'Nguyen Van B',
                'email' => 'nguyenvanb@example.com',
                'diachi' => 'Da Nang',
                'idgroup' => 1,
                'nghenghiep' => 'Tester',
                'phai' => 'Nữ',
                'password' => '',
                'password_confirmation' => '',
            ]);

        $updateResponse
            ->assertSessionHasNoErrors()
            ->assertRedirect('/users');

        $this->assertDatabaseHas('users', [
            'id' => $createdUser->id,
            'name' => 'Nguyen Van B',
            'email' => 'nguyenvanb@example.com',
            'diachi' => 'Da Nang',
            'idgroup' => 1,
            'nghenghiep' => 'Tester',
            'phai' => 'Nữ',
        ]);

        $deleteResponse = $this
            ->actingAs($admin)
            ->delete('/users/' . $createdUser->id);

        $deleteResponse
            ->assertSessionHasNoErrors()
            ->assertRedirect('/users');

        $this->assertDatabaseMissing('users', [
            'id' => $createdUser->id,
        ]);
    }

    public function test_admin_cannot_delete_self(): void
    {
        $user = User::factory()->create([
            'idgroup' => 1,
        ]);

        $response = $this
            ->actingAs($user)
            ->delete('/users/' . $user->id);

        $response
            ->assertRedirect('/users')
            ->assertSessionHas('error');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
        ]);
    }

    public function test_normal_user_cannot_access_user_management(): void
    {
        $user = User::factory()->create([
            'idgroup' => 0,
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/users');

        $response
            ->assertRedirect('/')
            ->assertSessionHas('error');
    }

    public function test_normal_user_cannot_access_admin_management(): void
    {
        $user = User::factory()->create([
            'idgroup' => 0,
        ]);

        $categoryResponse = $this
            ->actingAs($user)
            ->get('/categories');

        $categoryResponse
            ->assertRedirect('/')
            ->assertSessionHas('error');

        $productResponse = $this
            ->actingAs($user)
            ->get('/products');

        $productResponse
            ->assertRedirect('/')
            ->assertSessionHas('error');
    }
}
