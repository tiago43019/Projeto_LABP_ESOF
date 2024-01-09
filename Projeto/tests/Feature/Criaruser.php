<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Faker\Factory as Faker;
use App\Models\User;



class Criaruser extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_criaruser(): void
    {
        $response = $this->post('register', [
            'name' => $faker->name,
            'username' => $faker->userName,
            'telemovel' => $faker->phoneNumber,
            'email' => $faker->email,
            'password' => $faker->password,
        ]);

        $user = User::all()->last();

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }
}
