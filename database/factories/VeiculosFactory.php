<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculos>
 */
class VeiculosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'modelo' => $this->faker->word(),
            'ano' => $this->faker->year(),
            'data_aquisicao' => $this->faker->date(),
            'kms_rodados_aquisicao' => $this->faker->numberBetween(0, 200000),
            'renavam' => $this->faker->unique()->numerify('###########'),
        ];
    }
}
