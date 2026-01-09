<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Biblioteca</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilo propio -->
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">📚 Biblioteca</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="/autores">Autores</a>
            <a class="nav-link" href="/seudonimos">Seudónimos</a>
            <a class="nav-link" href="/editoriales">Editoriales</a>
            <a class="nav-link" href="/libros">Libros</a>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
