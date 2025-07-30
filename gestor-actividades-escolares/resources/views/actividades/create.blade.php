@extends('layouts.app')

@section('title', 'Crear Actividad')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>➕ Crear Nueva Actividad</h4>
            <a href="{{ route('actividades.index') }}" class="btn btn-outline-secondary btn-sm">
                ← Volver al listado
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('actividades.store') }}" method="POST">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input
                            type="text"
                            name="nombre"
                            id="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            value="{{ old('nombre') }}"
                            required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea
                            name="descripcion"
                            id="descripcion"
                            class="form-control @error('descripcion') is-invalid @enderror"
                            rows="4"
                            required>{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Día, Hora inicio y Hora fin en una sola fila -->
                    <div class="row mb-3">
                        <!-- Día -->
                        <div class="col-md-4">
                            <label for="dia" class="form-label">Día</label>
                            <select
                                name="dia"
                                id="dia"
                                class="form-control @error('dia') is-invalid @enderror"
                                required>
                                <option value="">Selecciona</option>
                                <option value="lunes" {{ old('dia') == 'lunes' ? 'selected' : '' }}>Lunes</option>
                                <option value="martes" {{ old('dia') == 'martes' ? 'selected' : '' }}>Martes</option>
                                <option value="miércoles" {{ old('dia') == 'miércoles' ? 'selected' : '' }}>Miércoles</option>
                                <option value="jueves" {{ old('dia') == 'jueves' ? 'selected' : '' }}>Jueves</option>
                                <option value="viernes" {{ old('dia') == 'viernes' ? 'selected' : '' }}>Viernes</option>
                            </select>
                            @error('dia')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hora de inicio -->
                        <div class="col-md-4">
                            <label for="hora_inicio" class="form-label">Hora Inicio</label>
                            <input
                                type="time"
                                name="hora_inicio"
                                id="hora_inicio"
                                class="form-control @error('hora_inicio') is-invalid @enderror"
                                value="{{ old('hora_inicio') }}"
                                required>
                            @error('hora_inicio')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hora de fin -->
                        <div class="col-md-4">
                            <label for="hora_fin" class="form-label">Hora Fin</label>
                            <input
                                type="time"
                                name="hora_fin"
                                id="hora_fin"
                                class="form-control @error('hora_fin') is-invalid @enderror"
                                value="{{ old('hora_fin') }}"
                                required>
                            @error('hora_fin')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('actividades.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection