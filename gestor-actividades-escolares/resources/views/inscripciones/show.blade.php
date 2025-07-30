@extends('layouts.app')
@section('title', 'Inscripción')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalles de la Inscripción</h1>
        <div>
            {{-- <a href="{{ route('inscripciones.edit', $inscripcion) }}" class="btn btn-warning">Editar</a> --}}
            <a href="{{ route('inscripciones.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Alumno:</strong> {{ $inscripcion->alumno->nombre }} ({{ $inscripcion->alumno->curso }})</p>
            <p><strong>Actividad:</strong> {{ $inscripcion->actividad->nombre }} ({{ ucfirst($inscripcion->actividad->dia) }})</p>
            <p><strong>Fecha de Inscripción:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_inscripcion)->format('d/m/Y') }}</p>
            <p><strong>Estado:</strong>
                <span class="badge
                    @if($inscripcion->estado == 'pendiente') bg-warning
                    @elseif($inscripcion->estado == 'aceptada') bg-success
                    @else bg-danger @endif">
                    {{ ucfirst($inscripcion->estado) }}
                </span>
            </p>
            <p><strong>Creado:</strong> {{ $inscripcion->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
@endsection