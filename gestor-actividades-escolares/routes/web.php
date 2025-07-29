<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\InscripcionController;


Route::resource('actividades', ActividadController::class);
Route::resource('alumnos', AlumnoController::class);
Route::resource('inscripciones', InscripcionController::class);

Route::get('/', function () {
    return view('welcome');
})->name('home');