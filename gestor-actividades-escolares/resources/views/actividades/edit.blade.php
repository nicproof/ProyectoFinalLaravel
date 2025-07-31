@extends('layouts.app')

@section('title', 'Editar Actividad')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>✏️ Editar Actividad: <strong>{{ $actividad->nombre }}</strong></h4>
            <a href="{{ route('actividades.index') }}" class="btn btn-secondary">Volver</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('actividades.update', $actividad) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nombre y Día en fila -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre"
                                class="form-control @error('nombre') is-invalid @enderror"
                                value="{{ old('nombre', $actividad->nombre) }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="dia" class="form-label">Día</label>
                            <select name="dia" id="dia" class="form-control @error('dia') is-invalid @enderror"
                                required>
                                <option value="">Selecciona un día</option>
                                @foreach (['lunes', 'martes', 'miércoles', 'jueves', 'viernes'] as $d)
                                    <option value="{{ $d }}"
                                        {{ old('dia', $actividad->dia) == $d ? 'selected' : '' }}>
                                        {{ ucfirst($d) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('dia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Hora inicio y fin en fila -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="hora_inicio" class="form-label">Hora de Inicio</label>
                            <input type="time" name="hora_inicio" id="hora_inicio"
                                class="form-control @error('hora_inicio') is-invalid @enderror"
                                value="{{ old('hora_inicio', $actividad->hora_inicio) }}" required>
                            @error('hora_inicio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="hora_fin" class="form-label">Hora de Fin</label>
                            <input type="time" name="hora_fin" id="hora_fin"
                                class="form-control @error('hora_fin') is-invalid @enderror"
                                value="{{ old('hora_fin', $actividad->hora_fin) }}" required>
                            @error('hora_fin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                            rows="4" required>{{ old('descripcion', $actividad->descripcion) }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Actualizar Actividad</button>
                        <a href="{{ route('actividades.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
