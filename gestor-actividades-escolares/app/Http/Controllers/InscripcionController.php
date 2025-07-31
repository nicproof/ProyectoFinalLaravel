<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Alumno;
use App\Models\Actividad;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::with('alumno', 'actividad')->paginate(12);
        return view('inscripciones.index', compact('inscripciones'));
    }

    public function create()
    {
        $alumnos = Alumno::all();
        $actividades = Actividad::all();
        return view('inscripciones.create', compact('alumnos', 'actividades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'actividad_id' => 'required|exists:actividades,id',
            'fecha_inscripcion' => 'required|date',
            'estado' => 'required|in:pendiente,aceptada,cancelada',
        ]);

        // Evitar duplicados
        $existe = Inscripcion::where('alumno_id', $request->alumno_id)
                            ->where('actividad_id', $request->actividad_id)
                            ->exists();

        if ($existe) {
            return back()->withErrors(['error' => 'El alumno ya está inscrito en esta actividad.']);
        }

        Inscripcion::create($request->all());

        return redirect()->route('inscripciones.index')
                         ->with('success', 'Inscripción creada con éxito.');
    }

    public function show(Inscripcion $inscripcion)
    {
        return view('inscripciones.show', compact('inscripcion'));
    }

    public function edit(Inscripcion $inscripcion)
    {
        $alumnos = Alumno::all();
        $actividades = Actividad::all();
        return view('inscripciones.edit', compact('inscripcion', 'alumnos', 'actividades'));
    }

    public function update(Request $request, Inscripcion $inscripcion)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'actividad_id' => 'required|exists:actividades,id',
            'fecha_inscripcion' => 'required|date',
            'estado' => 'required|in:pendiente,aceptada,cancelada',
        ]);

        // Evitar duplicados (excepto la actual)
        $duplicado = Inscripcion::where('alumno_id', $request->alumno_id)
                               ->where('actividad_id', $request->actividad_id)
                               ->where('id', '!=', $inscripcion->id)
                               ->exists();

        if ($duplicado) {
            return back()->withErrors(['error' => 'Ya existe una inscripción para este alumno en esta actividad.']);
        }

        $inscripcion->update($request->all());

        return redirect()->route('inscripciones.index')
                         ->with('success', 'Modificación del Estado de la Inscripción realizada con éxito.');
    }

    public function destroy(Inscripcion $inscripcion)
    {
        $inscripcion->delete();
        return redirect()->route('inscripciones.index')
                         ->with('success', 'Inscripción eliminada con éxito.');
    }
}