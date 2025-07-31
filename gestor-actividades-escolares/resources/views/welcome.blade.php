@extends('layouts.init')

@section('title', 'Bienvenido')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Gestión de Actividades Escolares</h1>
        <p class="col-md-8 fs-5">Organiza y administra alumnos, actividades extracurriculares e inscripciones de manera eficiente y rápida.</p>
        <a href="{{ route('alumnos.index') }}" class="btn btn-primary btn-lg mt-3">Comenzar</a>
    </div>
</div>

<div class="row text-center mt-5">
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Gestión de Alumnos</h5>
                <p class="card-text">Registra, edita y consulta la información de los estudiantes en tiempo real.</p>
                <a href="{{ route('alumnos.index') }}" class="btn btn-outline-primary">Ver Alumnos</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Actividades</h5>
                <p class="card-text">Administra talleres, deportes y eventos escolares fácilmente.</p>
                <a href="{{ route('actividades.index') }}" class="btn btn-outline-success">Ver Actividades</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Inscripciones</h5>
                <p class="card-text">Asigna alumnos a actividades y lleva un control completo de sus participaciones.</p>
                <a href="{{ route('inscripciones.index') }}" class="btn btn-outline-warning">Ver Inscripciones</a>
            </div>
        </div>
    </div>
</div>

<div class="mt-5 text-center">
    <p class="text-muted">© 2025 Gestor Actividades Escolares | Desarrollado por Juan Carlos Darias Alonso</p>
</div>
@endsection
