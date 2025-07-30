@extends('layouts.app')
@section('title', 'Alumnos')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>👫 Alumnos</h1>
        <a href="{{ route('alumnos.create') }}" class="btn btn-success">➕ Nuevo Alumno</a>
    </div>

    @if($alumnos->isEmpty())
        <div class="alert alert-info">No hay alumnos registrados.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Curso</th>
                        <th>Edad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->nombre }}</td>
                            <td>{{ $alumno->curso }}</td>
                            <td>{{ $alumno->edad }}</td>
                            <td>
                                <a href="{{ route('alumnos.show', $alumno) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este alumno?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection