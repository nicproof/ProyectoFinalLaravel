<?php

namespace App\Http\Controllers\Api;

use App\Models\Actividad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActividadApiController extends Controller
{
    /**
     * Devuelve todas las actividades en formato JSON.
     */
    public function index()
    {
        $actividades = Actividad::select('id', 'nombre', 'descripcion', 'dia', 'hora_inicio', 'hora_fin')
                                ->orderBy('dia')
                                ->orderBy('hora_inicio')
                                ->get();

        return response()->json([
            'success' => true,
            'data' => $actividades,
            'message' => 'Actividades obtenidas correctamente.',
            'count' => $actividades->count()
        ], 200);
    }
}