<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Motoristas>
 */
class MotoristasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'data_nascimento' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'cnh' => $this->faker->unique()->numerify('###########'),
        ];
    }
}
