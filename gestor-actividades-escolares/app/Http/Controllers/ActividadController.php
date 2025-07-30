<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ActividadRequest;

class ActividadController extends Controller
{
    public function index()
    {
        $actividades = Actividad::paginate(12);
        return view('actividades.index', compact('actividades'));
    }

    public function create()
    {
        return view('actividades.create');
    }

    public function store(ActividadRequest $request)
    {
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

    public function update(ActividadRequest $request, Actividad $actividad)
    {

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



    public function generarPdf()
    {
        $actividades = Actividad::with(['inscripciones' => function ($query) {
            $query->with('alumno') // Cargar el alumno para la vista
                ->join('alumnos', 'inscripciones.alumno_id', '=', 'alumnos.id')
                ->orderByRaw("FIELD(inscripciones.estado, 'aceptada', 'pendiente', 'cancelada')")
                ->orderByRaw("SUBSTRING_INDEX(alumnos.nombre, ' ', -1)") // Último apellido
                ->orderBy('alumnos.nombre') // Nombre completo como respaldo
                ->select('inscripciones.*'); // Importante: solo seleccionar inscripciones.*
        }])->get();

        $pdf = Pdf::loadView('actividades.pdf', compact('actividades'));
        return $pdf->stream('listado-actividades-alumnos.pdf');
    }
}
