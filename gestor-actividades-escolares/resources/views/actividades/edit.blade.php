@extends('layouts.app')
@section('title', 'Edit Activity')
@section('content')
    <h1>✏️ Edit Activity: {{ $activity->nombre }}</h1>

    <form action="{{ route('actividades.update', $activity) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Name</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $activity->nombre) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="dia" class="form-label">Day</label>
                <select name="dia" id="dia" class="form-control" required>
                    @foreach(['lunes', 'martes', 'miércoles', 'jueves', 'viernes'] as $d)
                        <option value="{{ $d }}" {{ old('dia', $activity->dia) == $d ? 'selected' : '' }}>{{ ucfirst($d) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="hora_inicio" class="form-label">Start Time</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ old('hora_inicio', $activity->hora_inicio) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="hora_fin" class="form-label">End Time</label>
                <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ old('hora_fin', $activity->hora_fin) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Description</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required>{{ old('descripcion', $activity->descripcion) }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('actividades.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection