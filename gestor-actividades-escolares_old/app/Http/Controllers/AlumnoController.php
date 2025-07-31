<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRequest; // Importa el Request
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

    public function store(AlumnoRequest $request) // Usa AlumnoRequest
    {
        Alumno::create($request->validated());

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno creado con éxito.');
    }

    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(AlumnoRequest $request, Alumno $alumno) // Usa AlumnoRequest
    {
        $alumno->update($request->validated());

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