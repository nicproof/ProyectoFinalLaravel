<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'actividades'; // sigue apuntando a la tabla en español

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'inscripciones')
            ->using(Inscripcion::class)
            ->withPivot(['fecha_inscripcion', 'estado']);
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }
}