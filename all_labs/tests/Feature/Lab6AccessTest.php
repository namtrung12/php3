<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Lab6AccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_when_visiting_download_page(): void
    {
        $response = $this->get('/download');

        $response->assertRedirect('/login');
    }

    public function test_non_admin_user_cannot_access_quantri_page(): void
    {
        $user = User::factory()->create(['idgroup' => 0]);

        $response = $this->actingAs($user)->get('/quantri');

        $response->assertRedirect('/lab6/dashboard');
    }

    public function test_admin_user_can_access_quantri_page(): void
    {
        $user = User::factory()->create(['idgroup' => 1]);

        $response = $this->actingAs($user)->get('/quantri');

        $response->assertOk();
        $response->assertSee('Chỉ admin mới xem được trang này.');
    }
}
