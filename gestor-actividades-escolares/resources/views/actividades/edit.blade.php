@extends('layouts.app')
@section('title', 'Edit actividad')
@section('content')
    <h1>✏️ Edit actividad: {{ $actividad->nombre }}</h1>

    <form action="{{ route('actividades.update', $actividad) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Name</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $actividad->nombre) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="dia" class="form-label">Day</label>
                <select name="dia" id="dia" class="form-control" required>
                    @foreach(['lunes', 'martes', 'miércoles', 'jueves', 'viernes'] as $d)
                        <option value="{{ $d }}" {{ old('dia', $actividad->dia) == $d ? 'selected' : '' }}>{{ ucfirst($d) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="hora_inicio" class="form-label">Start Time</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ old('hora_inicio', $actividad->hora_inicio) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="hora_fin" class="form-label">End Time</label>
                <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ old('hora_fin', $actividad->hora_fin) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Description</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required>{{ old('descripcion', $actividad->descripcion) }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('actividades.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection