<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atividade>
 */
class AtividadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'descricao' => $this->faker->text(),
            'link_foto' => 'https://picsum.photos/900/600',
            'duracao' => $this->faker->numberBetween(1, 100),
            'preco' => $this->faker->randomFloat(2, 10, 100),
            'pontuacao' => $this->faker->randomFloat(2, 0, 5),
        ];
    }
}
