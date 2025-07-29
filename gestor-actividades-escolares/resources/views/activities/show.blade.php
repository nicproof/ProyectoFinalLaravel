@extends('layouts.app')
@section('title', $activity->nombre)
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ $activity->nombre }}</h1>
        <div>
            <a href="{{ route('activities.edit', $activity) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('activities.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Description:</strong> {{ $activity->descripcion }}</p>
            <p><strong>Day:</strong> {{ ucfirst($activity->dia) }}</p>
            <p><strong>Time:</strong> 
                {{ \Carbon\Carbon::parse($activity->hora_inicio)->format('H:i') }} - 
                {{ \Carbon\Carbon::parse($activity->hora_fin)->format('H:i') }}
            </p>
            <p><strong>Created:</strong> {{ $activity->created_at->format('d/m/Y H:i') }}</p>
            @if($activity->updated_at != $activity->created_at)
                <p><strong>Updated:</strong> {{ $activity->updated_at->format('d/m/Y H:i') }}</p>
            @endif
        </div>
    </div>

    <!-- Alumnos inscritos -->
    <div class="mt-4">
        <h3>Enrolled Students</h3>
        @if($activity->alumnos->isEmpty())
            <p class="text-muted">No students enrolled in this activity.</p>
        @else
            <ul class="list-group">
                @foreach($activity->alumnos as $alumno)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $alumno->nombre }}</strong> ({{ $alumno->curso }})
                            <br>
                            <small>
                                Status: 
                                <span class="badge 
                                    @if($alumno->pivot->estado == 'aceptada') bg-success
                                    @elseif($alumno->pivot->estado == 'pendiente') bg-warning
                                    @else bg-danger @endif">
                                    {{ ucfirst($alumno->pivot->estado) }}
                                </span>
                                | Since: {{ \Carbon\Carbon::parse($alumno->pivot->fecha_inscripcion)->format('d/m/Y') }}
                            </small>
                        </div>
                        <div>
                            <a href="{{ route('inscripciones.edit', $alumno->pivot->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection