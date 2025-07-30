<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\InscripcionController;

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas RESTful (resource) sin modificar los parámetros por defecto
// Route::resource('actividades', ActividadController::class);
Route::resource('actividades', ActividadController::class)->parameters([
    'actividades' => 'actividad'
]);
Route::resource('alumnos', AlumnoController::class);
// Route::resource('inscripciones', InscripcionController::class);
Route::resource('inscripciones', InscripcionController::class)->parameters([
    'inscripciones' => 'inscripcion'
]);

<a href="{{ route('actividades.listado') }}" class="btn btn-danger mb-3">
    <i class="bi bi-target me-2"></i> Ver Listado de Actividades con Alumnos
</a>