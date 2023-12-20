<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $duracaoHoras = $this->faker->numberBetween(1, 10);
        $duracaoMinutos = $this->faker->numberBetween(0, 59);

        return [
            'preco' => $this->faker->randomFloat(2, 10, 100),
            'data_partida' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'duracao' => $duracaoHoras . ':' . $duracaoMinutos, // Manter como string
            'local' => $this->faker->word(),
        ];
    }
}
