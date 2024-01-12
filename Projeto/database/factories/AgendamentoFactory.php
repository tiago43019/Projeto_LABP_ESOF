<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agendamento>
 */
class AgendamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $diasDaSemana = ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
        $horarios = ['9:00', '11:00', '13:00', '15:00', '17:30', '18:30', '19:30'];

        $dia = $this->faker->randomElement($diasDaSemana);
        $hora = $this->faker->randomElement($horarios);

        return [
            'horario' => "$dia, $hora",
        ];
    }
}
