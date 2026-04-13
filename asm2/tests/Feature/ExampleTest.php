<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/categories');

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
            ->assertRedirect(route('products.index', absolute: false));
    }

    public function test_user_can_login_and_logout(): void
    {
        $user = User::factory()->create([
            'email' => 'lehanam3570@gmail.com',
            'password' => 'namtrung12',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'namtrung12',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('products.index', absolute: false));

        $logoutResponse = $this->post('/logout');

        $this->assertGuest();
        $logoutResponse->assertRedirect(route('login', absolute: false));
    }

    public function test_authenticated_user_can_view_users_page(): void
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

    public function test_authenticated_user_can_create_update_and_delete_user(): void
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

    public function test_authenticated_user_cannot_delete_self(): void
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
            ->assertRedirect('/categories')
            ->assertSessionHas('error');
    }
}
