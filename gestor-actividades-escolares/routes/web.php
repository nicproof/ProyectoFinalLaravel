<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\InscripcionController;

// Cambiamos actividades → activities
Route::resource('activities', ActivityController::class);

// El resto puede seguir en español
Route::resource('alumnos', AlumnoController::class);
Route::resource('inscripciones', InscripcionController::class);

Route::get('/', function () {
    return view('welcome');
})->name('home');