<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AllLabsNavigationTest extends TestCase
{
    use RefreshDatabase;

    public function test_portal_links_to_all_lab_modules(): void
    {
        $response = $this->get('/');

        $response->assertOk();

        foreach (range(1, 8) as $lab) {
            $response->assertSee('/lab'.$lab, false);
        }
    }

    public function test_each_lab_home_page_is_accessible(): void
    {
        foreach (range(1, 8) as $lab) {
            $this->followingRedirects()->get('/lab'.$lab)->assertOk();
        }
    }

    public function test_lab7_validation_routes_are_under_lab7_prefix(): void
    {
        $this->from('/lab7/hs')
            ->post('/lab7/hs', [])
            ->assertRedirect('/lab7/hs')
            ->assertSessionHasErrors(['hoten', 'tuoi', 'ngaysinh']);
    }
}
