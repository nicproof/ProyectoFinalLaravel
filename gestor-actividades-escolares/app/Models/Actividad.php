<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $guarded = [];

    protected $table = 'actividades';

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function alumnos()
    {
        return $this->hasManyThrough(Alumno::class, Inscripcion::class, 'actividad_id', 'id', 'id', 'alumno_id');
    }
}
