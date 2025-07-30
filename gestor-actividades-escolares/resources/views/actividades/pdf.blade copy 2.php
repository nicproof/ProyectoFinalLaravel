<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Actividades y Alumnos</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #333;
            margin: 1.5cm;
            line-height: 1.5;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #007bff;
        }

        .header h1 {
            font-size: 18px;
            color: #007bff;
            margin: 0;
        }

        .header p {
            font-size: 11px;
            color: #666;
            margin: 5px 0 0 0;
        }

        .activity {
            margin-bottom: 12px;
            page-break-inside: avoid;
            border-left: 3px solid #007bff;
            padding-left: 10px;
        }

        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 6px;
        }

        .activity-title {
            font-weight: bold;
            font-size: 13px;
            color: #0056b3;
        }

        .activity-meta {
            font-size: 11px;
            color: #555;
        }

        .activity-description {
            font-style: italic;
            font-size: 11px;
            color: #666;
            margin: 4px 0;
        }

        .students {
            margin-top: 6px;
        }

        .student-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .student-item {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            padding: 2px 0;
        }

        .student-name {
            font-weight: 500;
            flex: 1;
        }

        .student-email {
            color: #777;
            flex: 1;
            margin-left: 10px;
        }

        .student-status {
            background-color: #007bff;
            color: white;
            font-size: 10px;
            font-weight: bold;
            padding: 1px 6px;
            border-radius: 10px;
            white-space: nowrap;
            margin-left: 8px;
        }

        .empty {
            font-size: 11px;
            color: #aaa;
            font-style: italic;
        }

        .footer {
            text-align: center;
            font-size: 10px;
            color: #999;
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

        .badge {
            display: inline-block;
            padding: 1px 6px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
        }

        .badge-aceptada {
            background-color: #28a745;
            color: white;
        }

        .badge-pendiente {
            background-color: #ffc107;
            color: #000;
        }

        .badge-cancelada {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>🎯 Listado de Actividades Extraescolares</h1>
        <p>Generado el: {{ now()->format('d/m/Y \a \l\a\s H:i') }} | Centro Educativo</p>
    </div>

    @foreach ($actividades as $actividad)
        <div class="activity">
            <div class="activity-header">
                <span class="activity-title">{{ $actividad->nombre }}</span>
                <span class="activity-meta">
                    {{ ucfirst($actividad->dia) }} • {{ \Carbon\Carbon::parse($actividad->hora_inicio)->format('H:i') }}-{{ \Carbon\Carbon::parse($actividad->hora_fin)->format('H:i') }}
                </span>
            </div>

            @if ($actividad->descripcion)
                <div class="activity-description">{{ $actividad->descripcion }}</div>
            @endif

            <div class="students">
                @if ($actividad->inscripciones->isNotEmpty())
                    <ul class="student-list">
                        @foreach ($actividad->inscripciones as $inscripcion)
                            @if ($inscripcion->alumno)
                                <li class="student-item">
                                    <span class="student-name">{{ $inscripcion->alumno->nombre }}</span>
                                    <span class="student-email">{{ $inscripcion->alumno->email }}</span>
                                    <span class="student-status badge badge-{{ strtolower($inscripcion->estado) }}">
                                        {{ ucfirst($inscripcion->estado) }}
                                    </span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <p class="empty">Sin alumnos inscritos</p>
                @endif
            </div>
        </div>
    @endforeach

    <div class="footer">
        Documento generado automáticamente • {{ now()->year }} • Sistema de Gestión de Actividades
    </div>

</body>
</html>