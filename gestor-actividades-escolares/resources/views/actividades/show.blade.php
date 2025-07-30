@extends('layouts.app')

@section('title', 'Detalle de Actividad')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>📘 Actividad: {{ $actividad->nombre }}</h1>
        <div>
            <a href="{{ route('actividades.edit', $actividad) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('actividades.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Día:</strong> {{ ucfirst($actividad->dia) }}</p>
            <p><strong>Hora:</strong> {{ $actividad->hora }}</p>
            <p><strong>Descripción:</strong> {{ $actividad->descripcion }}</p>
        </div>
    </div>

    <h4>🧑‍🎓 Alumnos Inscritos ({{ $actividad->inscripciones->count() }})</h4>

    @if($actividad->inscripciones->isEmpty())
        <div class="alert alert-info">No hay alumnos inscritos en esta actividad.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Alumno</th>
                        <th>Curso</th>
                        <th>Fecha de inscripción</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actividad->inscripciones as $inscripcion)
                        <tr>
                            <td>{{ $inscripcion->alumno->nombre ?? 'Alumno eliminado' }}</td>
                            <td>{{ $inscripcion->alumno->curso ?? 'N/D' }}</td>
                            <td>{{ \Carbon\Carbon::parse($inscripcion->fecha_inscripcion)->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge 
                                    @if($inscripcion->estado == 'pendiente') bg-warning
                                    @elseif($inscripcion->estado == 'aceptada') bg-success
                                    @else bg-danger @endif">
                                    {{ ucfirst($inscripcion->estado ?? 'desconocido') }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
