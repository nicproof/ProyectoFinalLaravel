<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'curso' => 'required|string|max:255',
            'edad' => 'required|integer|min:5|max:18',
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno creado con éxito.');
    }

    // public function show(Alumno $alumno)
    // {
    //     return view('alumnos.show', compact('alumno'));
    // }

    public function show(Alumno $alumno)
    {
        $alumno->load('inscripciones.actividad');
        return view('alumnos.show', compact('alumno'));
    }


    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'curso' => 'required|string|max:255',
            'edad' => 'required|integer|min:5|max:18',
        ]);

        $alumno->update($request->all());

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno actualizado con éxito.');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno eliminado con éxito.');
    }
}
