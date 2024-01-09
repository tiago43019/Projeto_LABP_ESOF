<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class Loginuser extends TestCase
{
    use RefreshDatabase;

    public function testLoginUser(): void
    {
        $loginData = [
            'username' => 'jsilvaa',
            'password' => 'teste12345',
        ];

        // Faz Post
        $response = $this->post('/login', $loginData);

        // Verifique se o login foi bem-sucedido
        $response->assertStatus(302);

    }
}
