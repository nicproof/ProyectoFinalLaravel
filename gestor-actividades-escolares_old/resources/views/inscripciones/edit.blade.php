@extends('layouts.app')

@section('title', 'Editar Inscripción')

@section('content')
    <h1>✏️ Editar Inscripción</h1>

    <div class="alert alert-info mb-4" role="alert">
        <small>📌 Los campos con <strong>borde rojo</strong> no se pueden modificar. Solo puedes cambiar el <strong>estado</strong>.</small>
    </div>
    

    <form action="{{ route('inscripciones.update', $inscripcion) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Alumno (solo lectura con borde rojo) -->
            <div class="col-md-6 mb-3">
                <label for="alumno_id" class="form-label">Alumno</label>
                <select name="alumno_id" id="alumno_id" class="form-control border-danger bg-light" disabled required>
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id }}" {{ $inscripcion->alumno_id == $alumno->id ? 'selected' : '' }}>
                            {{ $alumno->nombre }} ({{ $alumno->curso }})
                        </option>
                    @endforeach
                </select>
                <!-- Campo oculto para mantener el valor -->
                <input type="hidden" name="alumno_id" value="{{ $inscripcion->alumno_id }}">
            </div>

            <!-- Actividad (solo lectura con borde rojo) -->
            <div class="col-md-6 mb-3">
                <label for="actividad_id" class="form-label">Actividad</label>
                <select name="actividad_id" id="actividad_id" class="form-control border-danger bg-light" disabled required>
                    @foreach($actividades as $actividad)
                        <option value="{{ $actividad->id }}" {{ $inscripcion->actividad_id == $actividad->id ? 'selected' : '' }}>
                            {{ $actividad->nombre }} ({{ ucfirst($actividad->dia) }})
                        </option>
                    @endforeach
                </select>
                <!-- Campo oculto para mantener el valor -->
                <input type="hidden" name="actividad_id" value="{{ $inscripcion->actividad_id }}">
            </div>
        </div>

        <div class="row">
            <!-- Fecha de Inscripción (solo lectura con borde rojo) -->
            <div class="col-md-6 mb-3">
                <label for="fecha_inscripcion" class="form-label">Fecha de Inscripción</label>
                <input 
                    type="date" 
                    name="fecha_inscripcion" 
                    id="fecha_inscripcion" 
                    class="form-control border-danger bg-light" 
                    value="{{ old('fecha_inscripcion', $inscripcion->fecha_inscripcion) }}" 
                    disabled 
                    required>
                <!-- Campo oculto para mantener el valor -->
                <input type="hidden" name="fecha_inscripcion" value="{{ $inscripcion->fecha_inscripcion }}">
            </div>

            <!-- Estado (editable con borde verde) -->
            <div class="col-md-6 mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-control border-success border-3" required>
                    <option value="pendiente" {{ $inscripcion->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="aceptada" {{ $inscripcion->estado == 'aceptada' ? 'selected' : '' }}>Aceptada</option>
                    <option value="cancelada" {{ $inscripcion->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>
        </div>

        <!-- Botones -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                Actualizar Estado
            </button>
            <a href="{{ route('inscripciones.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
        </div>
    </form>
@endsection