@extends('layouts.app')

@section('title', 'Crear Alumno')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>➕ Nuevo Alumno</h4>
            <a href="{{ route('alumnos.index') }}" class="btn btn-outline-secondary btn-sm">
                ← Volver al listado
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('alumnos.store') }}" method="POST">
                    @csrf

                    <!-- Nombre y Curso en fila -->
                    <div class="row mb-3">
                        <div class="col-md-6">
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

                        <div class="col-md-6">
                            <label for="curso" class="form-label">Curso</label>
                            <input
                                type="text"
                                name="curso"
                                id="curso"
                                class="form-control @error('curso') is-invalid @enderror"
                                value="{{ old('curso') }}"
                                required>
                            @error('curso')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Edad -->
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input
                            type="number"
                            name="edad"
                            id="edad"
                            class="form-control @error('edad') is-invalid @enderror"
                            value="{{ old('edad') }}"
                            min="5"
                            max="18"
                            required>
                        @error('edad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Guardar Alumno</button>
                        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection