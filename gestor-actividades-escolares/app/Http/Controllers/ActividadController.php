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

    public function show(Actividad $activity)
    {
        return view('actividades.show', compact('activity'));
    }

    public function edit(Actividad $activity)
    {
        return view('actividades.edit', compact('activity'));
    }

    public function update(Request $request, Actividad $activity)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'dia' => 'required|in:lunes,martes,miércoles,jueves,viernes',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        $activity->update($request->all());

        return redirect()->route('actividades.index')
                         ->with('success', 'Actividad actualizada con éxito.');
    }

    public function destroy(Actividad $activity)
    {
        $activity->delete();
        return redirect()->route('actividades.index')
                         ->with('success', 'Actividad eliminada con éxito.');
    }
}