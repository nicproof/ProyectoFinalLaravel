<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index()
    {
        $actividades = Actividad::all();
        return view('actividades.index', compact('actividades'));
    }

    public function create()
    {
        return view('actividades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'dia' => 'required|in:lunes,martes,miércoles,jueves,viernes',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        Actividad::create($request->all());

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad creada con éxito.');
    }

    // public function show(Actividad $actividad)
    // {
    //     return view('actividades.show', compact('actividad'));
    // }

    public function show(Actividad $actividad)
    {
        $actividad->load('inscripciones.alumno'); // Asegura que la relación esté cargada
        return view('actividades.show', compact('actividad'));
    }


    public function edit(Actividad $actividad)
    {
        return view('actividades.edit', compact('actividad'));
    }

    public function update(Request $request, Actividad $actividad)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'dia' => 'required|in:lunes,martes,miércoles,jueves,viernes',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        $actividad->update($request->all());

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad actualizada con éxito.');
    }

    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
        return redirect()->route('actividades.index')
            ->with('success', 'Actividad eliminada con éxito.');
    }

    public function listadoConAlumnos()
    {
        $actividades = Actividad::with(['inscripciones.alumno' => function ($query) {
            $query->orderBy('nombre'); // Opcional: ordenar alumnos por nombre
        }])->get();

        return view('actividades.listado', compact('actividades'));
    }
}
