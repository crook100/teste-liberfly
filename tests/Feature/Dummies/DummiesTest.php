<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Tests\TestCase;

class DummiesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $token = JWTAuth::fromUser(User::first());
        $headers['Authorization'] = 'Bearer ' . $token;

        $response = $this->get('/api/dummies', $headers);
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'data'
            ]);
    }
}
