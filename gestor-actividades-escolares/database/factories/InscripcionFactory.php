<?php

namespace Database\Factories;

use App\Models\Inscripcion;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscripcionFactory extends Factory
{
    protected $model = Inscripcion::class;

    public function definition(): array
    {
        return [
            'fecha_inscripcion' => $this->faker->dateTimeBetween('-2 months', 'now')->format('Y-m-d'),
            'estado' => $this->faker->randomElement(['pendiente', 'aceptada', 'cancelada']),
        ];
    }
}