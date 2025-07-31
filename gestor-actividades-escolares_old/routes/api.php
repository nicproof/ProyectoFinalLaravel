<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ActividadApiController;

// Ruta pública: obtener todas las actividades
Route::get('/actividades', [ActividadApiController::class, 'index']);