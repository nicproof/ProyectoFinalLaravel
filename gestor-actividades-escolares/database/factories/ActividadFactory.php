<?php

namespace Database\Factories;

use App\Models\Actividad;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActividadFactory extends Factory
{
    protected $model = Actividad::class;

    public function definition(): array
    {
        $nombres = [
            'Fútbol', 'Baloncesto', 'Robótica', 'Ajedrez', 'Música', 'Danza', 'Pintura',
            'Teatro', 'Ciencias', 'Lectura Creativa', 'Natación', 'Inglés Avanzado'
        ];

        $dias = ['lunes', 'martes', 'miércoles', 'jueves', 'viernes'];

        return [
            'nombre' => $this->faker->randomElement($nombres),
            'descripcion' => $this->faker->sentence(8),
            'dia' => $this->faker->randomElement($dias),
            'hora_inicio' => $this->faker->randomElement(['15:00', '15:30', '16:00']),
            'hora_fin' => $this->faker->randomElement(['16:30', '17:00', '17:30']),
        ];
    }
}