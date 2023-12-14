<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_user_can_register_as_doctor()
    {
        // Replace 'doctor' with 'admin' or 'patient' to test other roles
        $role = 'doctor';

        $response = $this->post(route('register'), [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => $role,
        ]);

        $response->assertRedirect(route('home'));

        $this->assertAuthenticated();

        // Ensure the user has the correct role
        $this->assertTrue(auth()->user()->hasRole($role));
    }
}
