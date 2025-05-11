<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inicio - Barbería El Corte Fino</title>
  <link rel="stylesheet" href="styles2.css" />
</head>
<body>
  <header class="main-header">
    <h1>Bienvenido a Classic Barber Club</h1>
    <nav>
      <ul>
        <li><a href="#" onclick="mostrarSeccion('inicio')">Inicio</a></li>
        <li><a href="#" onclick="mostrarSeccion('servicios')">Servicios</a></li>
        <li><a href="#" onclick="mostrarSeccion('agendar')">Agendar Cita</a></li>
        <li><a href="#" onclick="mostrarSeccion('mis-citas')">Mis Citas</a></li>
        <li><a href="#" onclick="mostrarSeccion('perfil')">Mi Perfil</a></li>
        <li><a href="#" onclick="mostrarSeccion('promociones')">Promociones</a></li>
        <li><a href="#" onclick="mostrarSeccion('calificacion')">Calificanos</a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
      </ul>
    </nav>
  </header>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>

  <!-- Copia el resto del contenido proporcionado aquí -->
  <!-- Desde el anuncio hasta el footer -->
</body>
</html>