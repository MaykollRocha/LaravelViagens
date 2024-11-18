<?php

namespace Database\Factories;

use App\Models\Veiculos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * O nome do modelo correspondente à Factory.
     *
     * @var string
     */
    protected $model = Veiculos::class;

    /**
     * Defina os estados de atributos do modelo.
     *
     * @return array
     */
    public function definition()
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
