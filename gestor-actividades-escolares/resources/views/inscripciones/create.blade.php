@extends('layouts.app')
@section('title', 'Nueva Inscripción')
@section('content')
    <h1>➕ Nueva Inscripción</h1>

    <form action="{{ route('inscripciones.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="alumno_id" class="form-label">Alumno</label>
                <select name="alumno_id" id="alumno_id" class="form-control" required>
                    <option value="">Seleccionar alumno</option>
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id }}" {{ old('alumno_id') == $alumno->id ? 'selected' : '' }}>
                            {{ $alumno->nombre }} ({{ $alumno->curso }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="actividad_id" class="form-label">Actividad</label>
                <select name="actividad_id" id="actividad_id" class="form-control" required>
                    <option value="">Seleccionar actividad</option>
                    @foreach($actividades as $actividad)
                        <option value="{{ $actividad->id }}" {{ old('actividad_id') == $actividad->id ? 'selected' : '' }}>
                            {{ $actividad->nombre }} ({{ ucfirst($actividad->dia) }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="fecha_inscripcion" class="form-label">Fecha de Inscripción</label>
                <input type="date" name="fecha_inscripcion" id="fecha_inscripcion" class="form-control" value="{{ old('fecha_inscripcion', now()->format('Y-m-d')) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="aceptada" {{ old('estado') == 'aceptada' ? 'selected' : '' }}>Aceptada</option>
                    <option value="cancelada" {{ old('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Guardar Inscripción</button>
            <a href="{{ route('inscripciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection