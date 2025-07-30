@extends('layouts.app')
@section('title', 'actividades')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>🎯 Actividades</h1>
        <a href="{{ route('actividades.create') }}" class="btn btn-success">➕ New actividad</a>
    </div>

    @if ($actividades->isEmpty())
        <div class="alert alert-info">No actividades registered.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actividades as $actividad)
                        <tr>
                            <td>{{ $actividad->nombre }}</td>
                            <td>{{ ucfirst($actividad->dia) }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($actividad->hora_inicio)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($actividad->hora_fin)->format('H:i') }}
                            </td>
                            <td>
                                <a href="{{ route('actividades.show', $actividad) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('actividades.edit', $actividad) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('actividades.destroy', $actividad) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this actividad?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection