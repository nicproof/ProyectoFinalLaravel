<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Gestión Escolar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>
<body class="d-flex flex-column min-vh-100">
    <main class="flex-fill">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Gestión Escolar</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('alumnos.index') }}">Alumnos</a>
                <a class="nav-link" href="{{ route('actividades.index') }}">Actividades</a>
                <a class="nav-link" href="{{ route('inscripciones.index') }}">Inscripciones</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show alert-small" id="alert-success" role="alert">
                <small>{{ session('success') }}</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Mensajes de error de validación -->
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show alert-small" id="alert-errors" role="alert">
                <small>
                    Corrige los siguientes errores:
                    <ul class="mb-0 mt-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>
</main>
        <footer class="bg-light py-2 text-center">
        © 2025 Sistema de Gestión Escolar | Desarrollado por Juan Carlos Darias Alonso
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para ocultar alertas después de 2 segundos -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alerts = ['#alert-success', '#alert-errors'];
            alerts.forEach(selector => {
                const alert = document.querySelector(selector);
                if (alert) {
                    setTimeout(() => {
                        const bsAlert = new bootstrap.Alert(alert);
                        bsAlert.close();
                    }, 2000);
                }
            });
        });
    </script>
</body>
</html>