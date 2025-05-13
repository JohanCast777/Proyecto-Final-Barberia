<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Perfil usuarios</title>
  <link rel="stylesheet" href="styles2.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="shortcut icon" href="/peluqueria.ico" type="image/x-icon">
  <style>
    /* styles2.css */
body {
    font-family: sans-serif; /* Puedes usar una fuente diferente aquí */
    margin: 0;
    padding: 0;
    background-color: #f4f4f4; /* Un fondo claro diferente */
    padding-top: 90px; /* Ajusta este valor según la nueva altura del navbar */
  }
  
  header {
    background-color: #fff;
    padding: 20px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  
  header h1 {
    color: #333;
    margin-bottom: 10px;
  }
  
  header nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 20px;
    padding: 10px 0;
  }
  
  header nav a {
    text-decoration: none;
    color: #007bff; /* Un color diferente para los enlaces */
    font-weight: bold;
    transition: color 0.3s ease;
  }
  
  header nav a:hover {
    color: #0056b3;
  }
  
  main {
    padding: 20px;
  }
  #servicios h2,
  #agendar h2,
  #agregarbarbero h2,
  #calificacion h2,
  #calificaciones h2,
  #estadisticas,
  #mis-citas h2,
  #perfil h2 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;
  }
  
  .servicios-lista {
    
    list-style: none;
    padding: 0;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    display: flex; /* Usamos flexbox para controlar la disposición */
  flex-direction:row; /* Apilamos los elementos verticalmente */
  align-items:center;
  
  }
  
  .servicios-lista li {
    background-color: #fff;
    padding: 10px 15px;
    min-width: 250px;
    width: calc(33.33% - 20px);
    margin-bottom: 8px;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    display: flex; /* Activa flexbox dentro de cada tarjeta para organizar el contenido */
  flex-direction: column; /* Organiza el contenido de la tarjeta verticalmente */
  align-items: center; /* Centra el contenido de la tarjeta horizontalmente */
  text-align: center; /* Centra el texto dentro de la tarjeta */
    
  }

  .servicios-lista li span:first-child {
    font-weight: bold;
    margin-bottom: 5px;
  }
  
  .servicios-lista li .precio-servicio {
    color: #007bff;
    font-weight: bold;
    font-size: 1.1em;
    margin-top: 10px; /* Empuja el precio hacia la parte inferior */
  }
  

  #form-agendar label,
  #form-calif label,
  #form-perfil label {
    display: block;
    margin-bottom: 5px;
    margin-top: 5px;     /* espacio desde el campo anterior */
    font-weight: bold;
    color: #555;
 
  }
  #form-agendar select,
  #form-agendar input[type="date"],
  #form-agendar input[type="time"],
  #form-agendar select,
  #form-calif input[type="number"],
  #form-calif select,
  #form-calif textarea,
  #form-agendar select,
  #form-perfil input[type="text"],
  #form-perfil input[type="email"],
  #form-perfil input[type="tel"],
  #form-perfil input[type="password"] {
    width: 400px;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }
  #agregarbarbero button[type="submit"],
  #form-agendar button[type="submit"],
  #form-perfil button[type="submit"],
  #form-calif button[type="submit"] {
    background: linear-gradient(135deg, #8e2de2, #4a00e0);
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s ease;
  }
  
  #mis-citas,
  #calificaciones table {
    width: auto;
    
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
  }
  
  #estadisticas th,
  #estadisticas td,
  #mis-citas th,
  #mis-citas td {
    padding: 10px 15px;
    text-align: left;
    border-bottom: 1px solid #eee;
  }
  #estadisticas th,
  #mis-citas th {
    background-color: #f8f8f8;
    font-weight: bold;
  }
  #estadisticas,
  #mis-citas tbody tr:last-child td {
    border-bottom: none;
  }
  
  
  #mis-citas tbody button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9em;
    transition: background-color 0.3s ease;
  }
  
  #mis-citas tbody button:hover {
    background-color: #c82333;
  }
  
  footer {
    text-align: center;
    padding: 20px;
    color: #777;
    border-top: 1px solid #eee;
    margin-top: 40px;
  }
  
  .hidden {
    display: none;
  }

  /* Estilos para la sección de llamada a la acción */
.call-to-action {
    background-color: #e0e4eb;
   
    padding: 180px 160px;
    text-align: center;
    border-bottom: 1px solid #eee;
  }
  
  .call-to-action h2 {
    color: #333;
    margin-bottom: 15px;
  }
  
  .call-to-action p {
    color: #666;
    margin-bottom: 20px;
  }
  
  .call-to-action button {
    background: linear-gradient(135deg, #8e2de2, #4a00e0);
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1.1em;
    transition: background-color 0.3s ease;
  }
  
  .services-list {
    list-style: none;
    padding: 0;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Diseño responsivo en columnas */
    gap: 20px;
    margin-bottom: 20px;
  }
  
  .services-list li {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: left;
  }
  
  .services-list li h3 {
    color: #333;
    margin-bottom: 10px;
  }
  
  .services-list li p {
    color: #666;
    margin-bottom: 15px;
  }
  
  .services-list li .price {
    color: #007bff;
    font-weight: bold;
    font-size: 1.2em;
  }
  
  .view-all-services {
    text-align: center;
    margin-top: 20px;
  }
  
  .view-all-services a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
  }
  
  .view-all-services a:hover {
    color: #0056b3;
    text-decoration: underline;
  }
  
  /* Estilos para la sección de promociones */
  .promotions-section {
    padding: 30px 20px;
    text-align: center;
  }

  .promotions-section h2{
    padding: 20px;
    text-align: center;
    
    
  
    
  }
  
  .promotion-card {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
  }
  
  .promotion-card button {
    background: linear-gradient(135deg, #8e2de2, #4a00e0); /* Un color llamativo para los botones de promoción */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s ease;
  }
    
  

  .formulario-centrado {
    max-width: 400px;
    margin: 50px auto; /* Centra horizontalmente */
    padding: 20px;
    background-color: #fff;
    border-radius: 15px;
    color: #555;
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .main-header {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    color: #ffffff;
    padding: px;
    text-align: center;
  }

  .main-header h1 {
    margin-top: 18px;
    font-size: 28px;
    color: #ffffff;
    font-weight: bold;
  }

  .main-header nav ul li a {
    color: #ffffff;
    text-decoration: none;
    font-weight: 500;
    padding: 8px 16px;
    border-radius: 6px;
    transition: background-color 0.3s;
  }

  .promo-detalle {
  margin: 20px auto;
  margin-top: 200px;
  padding: 50px;
  max-width: 500px;
  border: 2px solid #ccc;
  border-radius: 20px;
  background-color: #fefefe;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

  .navbar .nav-link.active, .navbar .nav-link:focus, .navbar .nav-link:hover {
    color: #2575fc !important;
    background-color: #f0f4ff;
    border-radius: 5px;
  }
  .navbar-brand {
    font-size: 1.3rem;
    letter-spacing: 1px;
  }
  .navbar {
    min-height: 70px;
    padding-top: 18px;
    padding-bottom: 18px;
    font-size: 1.08rem;
  }

  .brand-cursive {
    font-family: 'Pacifico', cursive;
    font-size: 1.5rem;
    letter-spacing: 1px;
  }
  </style>
</head>
<body>

  <!-- Navbar mejorado y fijo -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center fw-bold text-primary" href="#">
        <img src="/peluqueria.ico" alt="Logo" width="40" height="40" class="me-2">
        <span class="brand-cursive">Classic Barber Club</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#" onclick="mostrarSeccion('inicio')">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#" onclick="mostrarSeccion('servicios')">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#" onclick="mostrarSeccion('agendar')">Agendar Cita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#" onclick="mostrarSeccion('mis-citas')">Mis Citas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#" onclick="mostrarSeccion('perfil')">Mi Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#" onclick="mostrarSeccion('promociones')">Promociones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#" onclick="mostrarSeccion('calificacion')">Califícanos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold text-danger" href="index.html">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="anuncio" class="call-to-action">
    <h2>¿Listo para un corte de primera?</h2>
    <p>Agenda tu cita hoy mismo y experimenta el mejor servicio de barbería.</p>
    <button onclick="mostrarSeccion('agendar')">Agendar Cita Ahora</button>
  </section>

  <main>

    <!-- Seccion de inicio -->

    <section id="inicio" class="services-with-prices">
      <h2>Nuestros Servicios y Precios</h2>
      <ul class="services-list">
        <li>
          <h3>Corte Clásico</h3>
          <p>Un corte de cabello tradicional para un look impecable.</p>
          <span class="price">$25</span>
        </li>
        <li>
          <h3>Barba Completa</h3>
          <p>Afeitado y arreglo de barba con productos de calidad.</p>
          <span class="price">$20</span>
        </li>
        <li>
          <h3>Corte + Barba</h3>
          <p>El paquete completo para un cambio de imagen total.</p>
          <span class="price">$40</span>
        </li>
      </ul>
      <p class="view-all-services"><a href="#" onclick="mostrarSeccion('servicios')">Ver todos los servicios</a></p>
    </section>

    <!-- Seccion de servicios -->

    <section id="servicios" class="hidden">
      <h2>Servicios Disponibles</h2>
      <ul class="servicios-lista">
        <li>
          <span>Cortes clásicos</span>
          <img src="Images/corte.png" alt="Corte Clásico">
          <span class="precio-servicio">$14.000</span>
        </li>
        <li>
          <span>Barba completa</span>
          <img src="Images/barba.png">
          <span class="precio-servicio">$8.000</span>
        </li>
        <li>
          <span>Corte + Barba</span>
          <img src="Images/xwOYLXEQ8G2F2cjz.png">
          <span class="precio-servicio">$21.000</span>
        </li>
        <li>
          <span>Limpieza Facial</span>
          <img src="Images/liempieza.PNG">
          <span class="precio-servicio">$10.000</span>
        </li>
        <li>
          <span>Depilado de Cejas</span>
          <img src="Images/cejas.PNG">
          <span class="precio-servicio">$3.000</span>
        </li>
        <li>
          <span>Tinte de Cabello</span>
          <img src="Images/Tinturado.PNG">
          <span class="precio-servicio">$80.000</span>
        </li>
        <li>
          <span>Rayos para el Cabello</span>
          <img src="Images/rayos.jpg">
          <span class="precio-servicio">$80.000</span>
        </li>
      </ul>
    </section>

    <!-- Seccion de agendar -->
    <section id="agendar" class="hidden">
      <h2>Agendar Cita</h2>
      <form id="form-agendar" class="formulario-centrado">
        <label for="barbero">Seleccionar Barbero:</label>
        <select type="select" id="barbero" name="barbero">
          <option value="">-- Selecciona --</option>
          <option value="1">Carlos</option>
          <option value="2">Andrés</option>
          <option value="3">Felipe</option>
        </select>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" required>

        <label for="servicio">Servicio:</label>
        <select type="select" id="servicio" name="servicio">
          <option value="">-- Selecciona --</option>
          <option value="corte">Corte Clásico</option>
          <option value="barba">Barba Completa</option>
          <option value="combo">Corte + Barba</option>
          <option value="combo">Limpieza Facial</option>
          <option value="combo">Despilacion de Cejas</option>
          <option value="combo">Tintura de Cabello</option>
          <option value="combo">Rayos para el Cabello</option>
        </select>

        <button type="submit">Reservar Cita</button>
      </form>
    </section>

    <section id="mis-citas" class="hidden">
      <h2>Mis Citas</h2>
      <table>
        <thead>
          <tr>
            <th>ID cita</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Barbero</th>
            <th>Servicio</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>2025-05-03</td>
            <td>15:30</td>
            <td>Carlos</td>
            <td>Corte</td>
            <td>Confirmada</td>
            <td><button>Cancelar</button></td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- Seccion de perfil -->
    <section id="perfil" class="hidden">
      <h2>Mi Perfil</h2>
      <form id="form-perfil" class="formulario-centrado">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name ="apellido">

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" value="juan@example.com">

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" value="3200000000">

        <label for="contrase">Contraseña:</label>
        <input type="password" id="contrase" name="contraseña">
        
        <label for="fecha-registro">Fecha de Registro:</label>
        <input type="text" id="fecha-registro" name="fecha-registro" readonly>

        <button type="submit">Actualizar Perfil</button>
      </form>
    </section>

    <section id="promociones" class="hidden promotions-section">
      <h2>¡Nuestras Promociones Especiales!</h2>
      <div class="promotion-card", >
        <h3>Descuento de Bienvenida</h3>
        <p>15% de descuento en tu primer corte.</p>
        <button onclick="mostrarDetalle('detalle-bienvenida')">Ver Detalles</button>
      </div>
      <div class="promotion-card">
        <h3>Martes de Barba</h3>
        <p>Arreglo de barba a mitad de precio todos los martes.</p>
        <button onclick="mostrarDetalle('detalle-martes')">Ver Detalles</button>
      </div>
      <div class="promotion-card">
        <h3>Paquete Familiar</h3>
        <p>Corte para papá e hijo con un precio especial.</p>
        <button onclick="mostrarDetalle('detalle-familiar')">Ver Detalles</button>
      </div>


          <!-- Tarjeta de detalles: Descuento de Bienvenida -->
<div id="detalle-bienvenida" class="promo-detalle hidden">
  <h3>Descuento de Bienvenida</h3>
  <p><strong>Descripción:</strong> 15% de descuento en tu primer corte.</p>
  <p><strong>Descuento:</strong> 15%</p>
  <p><strong>Fecha de Inicio:</strong> 01/05/2025</p>
  <p><strong>Fecha de Fin:</strong> 30/06/2025</p>
  <p><strong>Usos Máximos:</strong> 1 por persona</p>
</div>

<!-- Tarjeta de detalles: Martes de Barba -->
<div id="detalle-martes" class="promo-detalle hidden">
  <h3>Martes de Barba</h3>
  <p><strong>Descripción:</strong> Arreglo de barba a mitad de precio todos los martes.</p>
  <p><strong>Descuento:</strong> 50%</p>
  <p><strong>Fecha de Inicio:</strong> 01/05/2025</p>
  <p><strong>Fecha de Fin:</strong> 31/12/2025</p>
  <p><strong>Usos Máximos:</strong> Ilimitado (solo martes)</p>
</div>

<!-- Tarjeta de detalles: Paquete Familiar -->
<div id="detalle-familiar" class="promo-detalle hidden">
  <h3>Paquete Familiar</h3>
  <p><strong>Descripción:</strong> Corte para papá e hijo con un precio especial.</p>
  <p><strong>Descuento:</strong> 20%</p>
  <p><strong>Fecha de Inicio:</strong> 10/05/2025</p>
  <p><strong>Fecha de Fin:</strong> 10/07/2025</p>
  <p><strong>Usos Máximos:</strong> 2 por familia</p>
</div>

<!-- Seccion de calificaciones de los barberos -->
 
    <section id="calificacion" class="hidden">
      <h2>Califica tu experiencia</h2>
      <form id="form-calif" class="formulario-centrado">
        <label for="idCita">ID de la Cita:</label>
        <input type="number" id="idCita" name="idCita" required><br>
    
        <label for="puntuacion">Puntuación (1 a 5):</label>
        <select type="numberr" id="puntuacion" name="puntuacion" required>
          <option value="">Selecciona</option>
          <option value="1">1 - Muy malo</option>
          <option value="2">2 - Malo</option>
          <option value="3">3 - Regular</option>
          <option value="4">4 - Bueno</option>
          <option value="5">5 - Excelente</option>
        </select><br>
    
        <label for="comentario">Comentario:</label>
        <textarea type="comentario" id="comentario" name="comentario" rows="4"></textarea><br>
    
      
    
        <button type="submit">Enviar Calificación</button>
      </form>
    </section>

    <!-- Seccion de horarios de trabajo -->
    <section id="horarios-trabajo" class="hidden">
      <div class="container">
        <h4>Horarios de Trabajo</h4>

        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" action="" class="mb-3 row">
          <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar horario...">
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Buscar</button>
          </div>
          <div class="col-md-6 text-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearHorarioModal">
              Nuevo horario
            </button>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table table-bordered table-hover align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Día</th>
                <th>Hora de Inicio</th>
                <th>Hora de Fin</th>
                <th class="text-center">Acción</th>
              </tr>
            </thead>
            <tbody>
              @forelse($workhours as $workhour)
                <tr>
                  <td>{{ $workhour->id }}</td>
                  <td>{{ $workhour->day }}</td>
                  <td>{{ $workhour->start_time }}</td>
                  <td>{{ $workhour->end_time }}</td>
                  <td class="text-center">
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editarHorarioModal" data-id="{{ $workhour->id }}" data-day="{{ $workhour->day }}" data-start="{{ $workhour->start_time }}" data-end="{{ $workhour->end_time }}">Editar</button>
                    <form action="{{ route('workhours.destroy', $workhour->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro de eliminar este horario?')">Eliminar</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center">No hay horarios registrados.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-center">
          {{ $workhours->links() }}
        </div>
      </div>
    </section>

  </main>

  <footer>
    <p>© 2025 Classic Barber Club - Todos los derechos reservados</p>
  </footer>

  <script>
    function mostrarSeccion(id) {
      const secciones = document.querySelectorAll("main > section");
      secciones.forEach(sec => sec.classList.add("hidden"));
      document.getElementById(id).classList.remove("hidden");
  
      // Mostrar u ocultar el anuncio según la sección actual
      const anuncio = document.getElementById("anuncio");
      if (id === "inicio") {
        anuncio.classList.remove("hidden");
      } else {
        anuncio.classList.add("hidden");
      }
    }

    function mostrarDetalle(id) {
    const tarjeta = document.getElementById(id);

    // Oculta otras tarjetas si están visibles
    const todas = document.querySelectorAll('.promo-detalle');
    todas.forEach(t => {
      if (t.id !== id) t.classList.add('hidden');
    });

    // Si ya está visible, ocúltala
    if (!tarjeta.classList.contains('hidden')) {
      tarjeta.classList.add('hidden');
    } else {
      tarjeta.classList.remove('hidden');
      tarjeta.scrollIntoView({ behavior: 'smooth' });
    }
  }
  </script>

</body>
</html>