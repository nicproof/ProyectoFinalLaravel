@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Actividades con Alumnos Inscritos</h2>

        @foreach ($actividades as $actividad)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4>{{ $actividad->nombre }} ({{ ucfirst($actividad->dia) }} - {{ $actividad->hora_inicio }} a {{ $actividad->hora_fin }})</h4>
                    <p class="mb-0">{{ $actividad->descripcion }}</p>
                </div>
                <div class="card-body">
                    @if ($actividad->inscripciones->isNotEmpty())
                        <h5>Alumnos Inscritos:</h5>
                        <ul class="list-group">
                            @foreach ($actividad->inscripciones as $inscripcion)
                                @if ($inscripcion->alumno)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <strong>{{ $inscripcion->alumno->nombre }}</strong>
                                            ({{ $inscripcion->alumno->email }})
                                        </span>
                                        <span class="badge bg-info text-dark">{{ ucfirst($inscripcion->estado) }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No hay alumnos inscritos en esta actividad.</p>
                    @endif
                </div>
            </div>
        @endforeach

        <a href="{{ route('actividades.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
    </div>
@endsection