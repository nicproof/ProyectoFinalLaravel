<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;

// database/factories/AlumnoFactory.php

public function definition(): array
{
    $nombres = ['Sara', 'Alejandro', 'Lucía', 'Daniel', 'Martina', 'Pablo', 'Alba', 'Diego', 'Claudia', 'Adrián', 'Jimena', 'Marcos', 'Nerea', 'Hugo', 'Laura'];
    $apellidos = ['García', 'Fernández', 'López', 'Martínez', 'Sánchez', 'Pérez', 'Rodríguez', 'Gómez', 'Díaz', 'Álvarez', 'Moreno', 'Romero', 'Navarro', 'Torres', 'Domínguez'];

    return [
        'nombre' => $this->faker->randomElement($nombres) . ' ' . $this->faker->randomElement($apellidos),
        'curso' => $this->faker->randomElement(['1º Primaria', '2º Primaria', '3º Primaria', '4º Primaria', '5º Primaria', '6º Primaria']),
        'edad' => $this->faker->numberBetween(6, 12),
    ];
}
}