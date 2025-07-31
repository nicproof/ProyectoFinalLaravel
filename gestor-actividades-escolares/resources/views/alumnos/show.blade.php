@extends('layouts.app')

@section('title', 'Detalles del Alumno')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>👨‍🎓 Alumno: {{ $alumno->nombre }}</h1>
        <div>
            <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Curso:</strong> {{ $alumno->curso }}</p>
            <p><strong>Edad:</strong> {{ $alumno->edad }}</p>
        </div>
    </div>

    <h4>📘 Actividades Inscritas</h4>

    @if($alumno->inscripciones->isEmpty())
        <div class="alert alert-info">Este alumno no está inscrito en ninguna actividad.</div>
    @else
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Actividad</th>
                    <th>Día</th>
                    <th>Fecha de Inscripción</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumno->inscripciones as $inscripcion)
                    @php $actividad = $inscripcion->actividad; @endphp
                    <tr>
                        <td>{{ $actividad->nombre ?? 'Actividad eliminada' }}</td>
                        <td>{{ $actividad->dia ?? 'N/D' }}</td>
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
    @endif
@endsection
