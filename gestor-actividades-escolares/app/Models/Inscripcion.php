<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;
use App\Models\Actividad;

class Inscripcion extends Model
{
    protected $guarded = [];

    protected $table = 'inscripciones';

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
