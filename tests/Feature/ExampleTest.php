<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_guests_are_redirected_to_login(): void
    {
        $response = $this->get('/');

        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_access_admin_dashboard(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'status' => true,
        ]);

        $this->actingAs($admin)
            ->get('/admin')
            ->assertStatus(200);
    }

    public function test_user_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
            'status' => true,
        ]);

        $this->actingAs($user)
            ->get('/admin')
            ->assertStatus(403);
    }

    public function test_guest_can_submit_contact_us_question(): void
    {
        $this->post('/contact-us', [
            'name' => 'Budi',
            'email' => 'budi@example.com',
            'question' => 'Apakah bengkel masih buka hari ini?',
        ])->assertRedirect(route('contact-us.create'));

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Budi',
            'email' => 'budi@example.com',
            'question' => 'Apakah bengkel masih buka hari ini?',
        ]);
    }
}
