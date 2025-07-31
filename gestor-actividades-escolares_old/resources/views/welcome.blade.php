@extends('layouts.app')
@section('content')
    <div class="text-center mt-5">
        <h1>Bienvenido al Sistema de Gestión Escolar</h1>
        <p class="lead">Gestiona actividades, alumnos e inscripciones fácilmente.</p>
        <div class="mt-4">
            <a href="{{ route('alumnos.index') }}" class="btn btn-success mx-2">Alumnos</a>
            <a href="{{ route('actividades.index') }}" class="btn btn-primary mx-2">Actividades</a>
            <a href="{{ route('inscripciones.index') }}" class="btn btn-info mx-2">Inscripciones</a>
        </div>
    </div>
@endsection