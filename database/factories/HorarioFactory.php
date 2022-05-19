<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Horario;
use App\Models\Restaurante;

class HorarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Horario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'abreAs' => $this->faker->time(),
            'fechaAs' => $this->faker->time(),
            'diasAberto' => '{}',
            'restaurante_id' => Restaurante::factory(),
        ];
    }
}
