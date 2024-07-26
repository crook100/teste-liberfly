<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $token = JWTAuth::fromUser(User::first());
        $headers['Authorization'] = 'Bearer ' . $token;

        $response = $this->post('/api/logout', [], $headers);
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'data'
            ]);
    }
}
