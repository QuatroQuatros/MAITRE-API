<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DiaSemana;
use App\Models\Horario;
use App\Models\HorarioDia;
use App\Models\Restaurante;

class HorarioDiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HorarioDia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'diaSemana_id' => DiaSemana::factory(),
            'horario_id' => Horario::factory(),
            'restaurante_id' => Restaurante::factory(),
        ];
    }
}
