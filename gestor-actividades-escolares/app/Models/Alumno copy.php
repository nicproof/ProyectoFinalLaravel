<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Actividad;
use App\Models\Inscripcion;

class Alumno extends Model
{
    protected $guarded = [];

    protected $table = 'alumnos';

    // public function actividades()
    // {
    //     return $this->belongsToMany(Actividad::class, 'inscripciones')
    //                 ->using(Inscripcion::class)
    //                 ->withPivot(['fecha_inscripcion', 'estado']);
    // }

    public function actividades()
{
    return $this->belongsToMany(Actividad::class, 'inscripciones')
                ->withPivot(['fecha_inscripcion', 'estado'])
                ->withTimestamps();
}

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }
}

