<!-- filepath: resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Barbería')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/peluqueria.ico">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Puedes poner esto en tu layout o en la vista de admin/crud -->
<div class="container mt-4">
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="tablasDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      Tablas del sistema
    </button>
    <ul class="dropdown-menu" aria-labelledby="tablasDropdown">
      <li><a class="dropdown-item" href="{{ route('crud.index') }}">Usuarios</a></li>
      <li><a class="dropdown-item" href="{{ route('crud.barbers') }}">Barberos</a></li>
      <li><a class="dropdown-item" href="{{ route('crud.services') }}">Servicios</a></li>      
      <li><a class="dropdown-item" href="{{ route('crud.diasnolaborados') }}">Días no laborables</a></li>
      <li><a class="dropdown-item" href="{{ route('crud.citas') }}">Citas</a></li>    
      <li><a class="dropdown-item" href="{{ route('crud.calificaciones') }}">Calificaciones</a></li>
      <li><a class="dropdown-item" href="{{ route('crud.promociones') }}">Promociones</a></li>
    </ul>
  </div>
</div>
    @yield('content')
</body>
</html>