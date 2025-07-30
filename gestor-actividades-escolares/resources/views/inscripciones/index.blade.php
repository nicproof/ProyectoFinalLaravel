@extends('layouts.app')
@section('title', 'Inscripciones')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>📋 Inscripciones</h1>
        <a href="{{ route('inscripciones.create') }}" class="btn btn-success">➕ Nueva Inscripción</a>
    </div>

    @if($inscripciones->isEmpty())
        <div class="alert alert-info">No hay inscripciones registradas.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Alumno</th>
                        <th>Actividad</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inscripciones as $inscripcion)
                        <tr>
                            <td>{{ $inscripcion->alumno->nombre }}</td>
                            <td>{{ $inscripcion->actividad->nombre }}</td>
                            <td>{{ \Carbon\Carbon::parse($inscripcion->fecha_inscripcion)->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge
                                    @if($inscripcion->estado == 'pendiente') bg-warning
                                    @elseif($inscripcion->estado == 'aceptada') bg-success
                                    @else bg-danger @endif">
                                    {{ ucfirst($inscripcion->estado) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('inscripciones.show', $inscripcion) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('inscripciones.edit', $inscripcion) }}" class="btn btn-sm btn-warning">Cambiar Estado</a>
                                <form action="{{ route('inscripciones.destroy', $inscripcion) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta inscripción?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection