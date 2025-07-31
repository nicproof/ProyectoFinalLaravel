<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Actividad;
use App\Models\Inscripcion;
use Database\Factories\AlumnoFactory;
use Database\Factories\ActividadFactory;
use Database\Factories\InscripcionFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Borrar datos en orden correcto
        Inscripcion::query()->delete();
        Alumno::query()->delete();
        Actividad::query()->delete();

        // Instanciar factories manualmente
        $alumnoFactory = new AlumnoFactory();
        $actividadFactory = new ActividadFactory();
        $inscripcionFactory = new InscripcionFactory();

        // Crear 20 alumnos
        $alumnos = collect();
        for ($i = 0; $i < 20; $i++) {
            $alumnos->push($alumnoFactory->create());
        }

        // Crear 8 actividades
        $actividades = collect();
        for ($i = 0; $i < 8; $i++) {
            $actividades->push($actividadFactory->create());
        }

        // Crear inscripciones
        foreach ($alumnos as $alumno) {
            $actividades_random = $actividades->random(rand(1, 3));

            foreach ($actividades_random as $actividad) {
                $exists = Inscripcion::where('alumno_id', $alumno->id)
                                    ->where('actividad_id', $actividad->id)
                                    ->exists();

                if (!$exists) {
                    $inscripcionFactory->create([
                        'alumno_id' => $alumno->id,
                        'actividad_id' => $actividad->id,
                    ]);
                }
            }
        }

        $this->command->info('✅ Base de datos poblada con datos realistas:');
        $this->command->info("   🧑‍🎓 {$alumnos->count()} alumnos creados.");
        $this->command->info("   🎯 {$actividades->count()} actividades creadas.");
        $this->command->info("   📝 " . Inscripcion::count() . " inscripciones generadas.");
    }
}