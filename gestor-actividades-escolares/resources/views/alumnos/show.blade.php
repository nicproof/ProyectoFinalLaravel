@extends('layouts.app')
@section('title', $alumno->nombre)
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ $alumno->nombre }}</h1>
        <div>
            <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Curso:</strong> {{ $alumno->curso }}</p>
            <p><strong>Edad:</strong> {{ $alumno->edad }} años</p>
            <p><strong>Creado:</strong> {{ $alumno->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <!-- Actividades inscritas -->
    <div class="mt-4">
        <h3>Actividades Inscritas</h3>
        @if($alumno->actividades->isEmpty())
            <p class="text-muted">Este alumno no está inscrito en ninguna actividad.</p>
        @else
            <ul class="list-group">
                @foreach($alumno->actividades as $actividad)
                    <li class="list-group-item">
                        {{ $actividad->nombre }} ({{ $actividad->dia }})
                        - <span class="badge bg-info">{{ $actividad->pivot->estado }}</span>
                        desde {{ \Carbon\Carbon::parse($actividad->pivot->fecha_inscripcion)->format('d/m/Y') }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection