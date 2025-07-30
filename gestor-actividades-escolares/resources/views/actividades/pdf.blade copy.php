<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Actividades y Alumnos</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #333;
            margin: 2cm;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        .header h1 {
            font-size: 22px;
            color: #007bff;
            margin: 0;
        }
        .header p {
            font-size: 14px;
            color: #666;
        }
        .activity-card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .activity-header {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            font-size: 16px;
        }
        .activity-body {
            padding: 12px;
        }
        .student-list {
            list-style: none;
            padding: 0;
        }
        .student-list li {
            padding: 5px 0;
            border-bottom: 1px dashed #eee;
        }
        .student-list li:last-child {
            border-bottom: none;
        }
        .badge {
            background-color: #17a2b8;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #999;
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎯 Listado de Actividades Extraescolares</h1>
        <p>Generado el: {{ now()->format('d/m/Y H:i') }} | Total: {{ $actividades->count() }} actividades</p>
    </div>

    @foreach ($actividades as $actividad)
        <div class="activity-card">
            <div class="activity-header">
                {{ $actividad->nombre }} 
                <small>{{ ucfirst($actividad->dia) }} • {{ \Carbon\Carbon::parse($actividad->hora_inicio)->format('H:i') }} - {{ \Carbon\Carbon::parse($actividad->hora_fin)->format('H:i') }}</small>
            </div>
            <div class="activity-body">
                <p><strong>Descripción:</strong> {{ $actividad->descripcion }}</p>
                @if ($actividad->inscripciones->isNotEmpty())
                    <p><strong>Alumnos inscritos ({{ $actividad->inscripciones->count() }}):</strong></p>
                    <ul class="student-list">
                        @foreach ($actividad->inscripciones as $inscripcion)
                            @if ($inscripcion->alumno)
                                <li>
                                    {{ $inscripcion->alumno->nombre }} 
                                    <small>({{ $inscripcion->alumno->email }})</small>
                                    <span class="badge">{{ ucfirst($inscripcion->estado) }}</span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <p><em>No hay alumnos inscritos.</em></p>
                @endif
            </div>
        </div>
    @endforeach

    <div class="footer">
        Documento generado automáticamente por el sistema de gestión de actividades.
    </div>
</body>
</html>