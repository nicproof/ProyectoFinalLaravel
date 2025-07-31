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

Route::get('/actividades-con-alumnos', [ActividadController::class, 'listadoConAlumnos'])
    ->name('actividades.listado');

Route::get('/actividades-pdf', [ActividadController::class, 'generarPdf'])
    ->name('actividades.pdf');
