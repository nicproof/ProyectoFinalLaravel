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

<div class="d-flex justify-content-center align-items-center flex-fill">
        <main style="width: 80%;">
            @yield('content')
        </main>
    </div>


</body>
</html>