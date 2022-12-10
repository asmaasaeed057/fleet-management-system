<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthenticationTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_successful_login()
    {
        $loginData = ['name' => 'Test User', 'email' => 'test@example.com', 'password' => '123456'];
        $this->json('POST', 'api/auth/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200);
            
        $this->assertAuthenticated();
    }

    public function test_successful_registration()
    {

        $userData = [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('123456'), // password
            'remember_token' => Str::random(10),
        ];

        $this->json('POST', 'api/auth/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
