@extends('layouts.app')
@section('title', 'Activities')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>⚙️ Activities</h1>
        <a href="{{ route('activities.create') }}" class="btn btn-success">➕ New Activity</a>
    </div>

    @if ($activities->isEmpty())
        <div class="alert alert-info">No activities registered.</div>
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
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->nombre }}</td>
                            <td>{{ ucfirst($activity->dia) }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($activity->hora_inicio)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($activity->hora_fin)->format('H:i') }}
                            </td>
                            <td>
                                <a href="{{ route('activities.show', $activity) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('activities.edit', $activity) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('activities.destroy', $activity) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this activity?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection