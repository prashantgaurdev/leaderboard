<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_add_a_user()
    {
        // Define user data
        $userData = [
            'name' => 'Anoop',
            'age' => 28,
            'points' => 50,
            'address' => 'Z-110 Sec 29 Gurgaon'
        ];

        // Send a POST request to create a new user
        $response = $this->post('/api/users', $userData);

        // Assert the response status
        $response->assertStatus(201);

        // Assert the response structure
        $response->assertJson([
            'name' => 'Anoop',
            'age' => 28,
            'points' => 50,
            'address' => 'Z-110 Sec 29 Gurgaon'
        ]);

        // Assert the user is in the database
        $this->assertDatabaseHas('users', $userData);
    }
}
