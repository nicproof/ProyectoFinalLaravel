<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $guarded = [];
     
    protected $table = 'actividades'; 

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