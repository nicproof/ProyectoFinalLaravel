@extends('layouts.app')
@section('title', 'Crear Alumno')
@section('content')
    <h1>➕ Nuevo Alumno</h1>

    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="curso" class="form-label">Curso</label>
                <input type="text" name="curso" id="curso" class="form-control" value="{{ old('curso') }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad') }}" min="5" max="18" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Guardar Alumno</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection