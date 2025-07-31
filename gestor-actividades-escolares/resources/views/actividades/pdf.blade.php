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
            line-height: 1.6;
            font-size: 14px;
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

        .activity-block {
            page-break-inside: avoid;
            margin-bottom: 20px;
        }

        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 10px;
            text-decoration: underline;
        }

        .activity-title {
            font-size: 14px;
            font-weight: bold;
            color: #0056b3;
            margin: 0;
        }

        .activity-meta {
            font-size: 11px;
            color: #555;
            white-space: nowrap;
        }

        .activity-description {
            font-size: 11px;
            font-style: italic;
            color: #666;
            margin: 4px 0;
        }

        .students {
            margin-top: 8px;
        }

        .student-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .student-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 11px;
            padding: 3px 0;
        }

        .student-info {
            flex: 1;
            display: flex;
            gap: 6px;
            color: #333;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .student-info span {
            white-space: nowrap;
        }

        .student-name {
            font-weight: 500;
        }

        .student-dot {
            color: #aaa;
        }

        .student-status {
            display: inline-block;
            padding: 1px 8px;
            border-radius: 8px;
            font-size: 8px;
            font-weight: bold;
            white-space: nowrap;
        }

        .student-status.aceptada {
            background-color: #28a745;
            color: white;
        }

        .student-status.pendiente {
            background-color: #ffc107;
            color: #000;
        }

        .student-status.cancelada {
            background-color: #dc3545;
            color: white;
        }

        .empty {
            font-size: 11px;
            color: #aaa;
            font-style: italic;
        }

        .activity-divider {
            border: 0;
            border-top: 1px dashed #ccc;
            margin: 12px 0;
        }

        .footer {
            text-align: center;
            font-size: 10px;
            color: #999;
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Listado de Actividades Escolares</h1>
        <p>Generado el: {{ now()->format('d/m/Y \a \l\a\s H:i') }} | Actividades Extraescolares</p>
    </div>

    @foreach ($actividades as $actividad)
        <div class="activity-block">
            <div class="activity-header">
                <h3 class="activity-title">{{ $actividad->nombre }}</h3>
                <div class="activity-meta">
                    {{ ucfirst($actividad->dia) }} • 
                    {{ \Carbon\Carbon::parse($actividad->hora_inicio)->format('H:i') }} - 
                    {{ \Carbon\Carbon::parse($actividad->hora_fin)->format('H:i') }}
                </div>
            </div>

            @if ($actividad->descripcion)
                <div class="activity-description">
                    {{ $actividad->descripcion }}
                </div>
            @endif

            <div class="students">
                @if ($actividad->inscripciones->isNotEmpty())
                    <ul class="student-list">
                        @foreach ($actividad->inscripciones as $inscripcion)
                            @if ($inscripcion->alumno)
                                <li class="student-item">
                                    <div class="student-info">
                                        <span class="student-name activity-title">{{ $inscripcion->alumno->nombre }}</span>
                                        <span class="student-dot">•</span>
                                        <span class="student-edad">{{ $inscripcion->alumno->edad }} años</span>
                                        <span class="student-dot">•</span>
                                        <span class="student-curso">{{ $inscripcion->alumno->curso }}</span>
                                        <span class="student-dot">•</span>
                                        Incrito con fecha: 
                                        <span class="student-fecha">{{ \Carbon\Carbon::parse($inscripcion->fecha_inscripcion)->format('d/m') }}</span>
                                        &nbsp;&nbsp;&nbsp;
                                        <span class="student-status {{ $inscripcion->estado }}">{{ ucfirst($inscripcion->estado) }}</span>
                                    </div>

                                </li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <p class="empty">Sin alumnos inscritos</p>
                @endif
            </div>

            <hr class="activity-divider">
        </div>
    @endforeach

    <div class="footer">
        Fin del listado • Gestión de Actividades Escolares
    </div>

</body>
</html>