<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Perfil barberos</title>
  <link rel="stylesheet" href="styles2.css" />
  <link rel="shortcut icon" href="/peluqueria.ico" type="image/x-icon">
  <style>
    /* barbero.css */
body {
    font-family: sans-serif; 
    margin: 0;
    padding: 0;
    background-color: #f4f4f4; 
  }
  
  header {
    background-color: #fff;
    padding: 20px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  header nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 20px;
    padding: 10px 0;
  }
  main {
    padding: 20px;
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

  #servicios h2,
  #agendar h2,
  #calificaciones h2,
  #mis-citas h2,
  #perfil h2 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;
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
  
  #form-agendar button[type="submit"],
  #form-perfil button[type="submit"],
  #filtro-citas button[type="button"],
  #form-calif button[type="submit"] {
    align-items: center;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s ease;
    background: linear-gradient(135deg, #8e2de2, #4a00e0);
  }
  
  #mis-citas table {
    width: 100%;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    justify-content: center;
  }
  
  #mis-citas th,
  #mis-citas td {
    padding: 10px 15px;
    text-align: center;
    border-bottom: 1px solid #eee;
  }
  
  #mis-citas th {
    background-color: #f8f8f8;
    font-weight: bold;
  }
  
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
    
  /* Estilo para las tarjetas de cada interfaz y centrarla */
  .formulario-centrado {
    max-width: 400px;
    margin: 50px auto; 
    padding: 20px;
    background-color: #fff;
    border-radius: 15px;
    color: #555;
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

#filtro-citas {
  display: flex; /* Activa el contexto de Flexbox */
  gap: 10px;      /* Espacio entre los elementos */
  margin-bottom: 15px;
  align-items: center; /* Alinea verticalmente los elementos al centro */
  justify-content: center; /* Centra horizontalmente los elementos */
}

#filtro-citas label {
  font-weight: bold;
}

#filtro-citas select,
#filtro-citas input[type="date"],
#filtro-citas button {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

#filtro-citas button {
  background-color: #8e2de2; /* Un color morado similar al de la imagen */
  color: white;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

#filtro-citas button:hover {
  background-color: #4a00e0; /* Un tono de morado más oscuro al hacer hover */
}
  </style>
</head>
<body>

  <header class="main-header">
    <h1>Hola Barber Bienvenido a Classic Barber Club</h1>
    <nav>
      <ul>
        <li><a href="#" onclick="mostrarSeccion('inicio')">Inicio</a></li>
        <li><a href="#" onclick="mostrarSeccion('mis-citas')">Mis Agenda</a></li>
        <li><a href="#" onclick="mostrarSeccion('perfil')">Mi Perfil</a></li>
        <li><a href="#" onclick="mostrarSeccion('calificaciones')">Tus Calificaciones</a></li>
        <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </ul>
    </nav>
  </header>

  <section id="anuncio" class="call-to-action">
    <h2>¿Desea revisar su agenda del dia?</h2>
    <p>Revise sus citas pendientes relacionadas a sus clientes.</p>
    <button onclick="mostrarSeccion('mis-citas')">Mirar agenda ahora</button>
  </section>

  <main>

    <!-- Seccion de inicio -->

    <section id="inicio" class="services-with-prices">
      <h2>Calificaciones Tuyas</h2>
      <ul class="services-list">
        <li>
          <h3>Jaime Perea</h3>
          <p>Buen barbero y detallista pero me corto un poco.</p>
          <span class="price"> ⭐ 4</span>
        </li>
        <li>
          <h3>Jose Pinto</h3>
          <p>Exelente Corte de Cabello.</p>
          <span class="price">⭐ 5</span>
        </li>
        <li>
          <h3>Rigo Bolaños</h3>
          <p>Me corto mas de lo que debia.</p>
          <span class="price">⭐ 4</span>
        </li>
      </ul>
      <p class="view-all-services"><a href="#" onclick="mostrarSeccion('calificaciones')">Ver todas las calificaciones</a></p>
    </section>

    <!-- Seccion de citas -->

    <section id="mis-citas" class="hidden">
  <h2>Mis Citas</h2>
  <div id="filtro-citas">
    <label for="filtrarPor">Filtrar por:</label>
    <select id="filtrarPor">
      <option value="hoy">Citas de Hoy</option>
      <option value="fecha">Fecha Específica</option>
    </select>
    <input type="date" id="fechaEspecifica" class="hidden">
    <button id="botonFiltrar" type="button"> Filtrar</button>
  </div>
  <table>
    <thead>
      <tr>
        <th>ID cita</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Cliente</th>
        <th>Servicio</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody id="tablaCitasBody">
      <tr>
        <td>1</td>
        <td>2025-05-03</td>
        <td>15:30</td>
        <td>Carlos</td>
        <td>Corte</td>
        <td>Confirmada</td>
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

    <section id="calificaciones" class="hidden">
            <h2>Calificaciones de Clientes</h2>
            <div class="formulario-centrado">
              <div>
                
                <!-- Tarjeta 1 -->
                <div>
                  <div>
                    <h3>Carlos Perea</h3>
                    <p>Calificación: ⭐ 4</p>
                  </div>
                  <a href="#" class="text-indigo-600 hover:underline">Ver más</a>
                </div>
                
                <!-- Tarjeta 2 -->
                <div>
                  <div>
                    <h3>Camilo Gonzales</h3>
                    <p>Calificación: ⭐ 4</p>
                  </div>
                  <a href="#" class="text-indigo-600 hover:underline">Ver más</a>
                </div>
          
                <!-- Tarjeta 3 -->
                <div >
                  <div>
                    <h3>Andrés Ramirez</h3>
                    <p>Calificación: ⭐ 3</p>
                  </div>
                  <a href="#" class="text-indigo-600 hover:underline">Ver más</a>
                </div>
          
                <!-- Puedes seguir agregando más barberos aquí -->
          
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


  document.addEventListener('DOMContentLoaded', () => {
  const filtrarPorSelect = document.getElementById('filtrarPor');
  const fechaEspecificaInput = document.getElementById('fechaEspecifica');
  const botonFiltrar = document.getElementById('botonFiltrar');
  const tablaCitasBody = document.getElementById('tablaCitasBody');
  const citasOriginales = Array.from(tablaCitasBody.rows).map(row => {
    return {
      fecha: row.cells[1].textContent,
      hora: row.cells[2].textContent,
      cliente: row.cells[3].textContent,
      servicio: row.cells[4].textContent,
      estado: row.cells[5].textContent,
      rowElement: row
    };
  });

  filtrarPorSelect.addEventListener('change', () => {
    fechaEspecificaInput.classList.toggle('hidden', filtrarPorSelect.value !== 'fecha');
  });

  botonFiltrar.addEventListener('click', () => {
    const filtroSeleccionado = filtrarPorSelect.value;
    let fechaFiltrar;

    if (filtroSeleccionado === 'hoy') {
      const hoy = new Date();
      const año = hoy.getFullYear();
      const mes = (hoy.getMonth() + 1).toString().padStart(2, '0');
      const dia = hoy.getDate().toString().padStart(2, '0');
      fechaFiltrar = `${año}-${mes}-${dia}`;
    } else if (filtroSeleccionado === 'fecha') {
      fechaFiltrar = fechaEspecificaInput.value;
    }

    // Limpiar la tabla
    tablaCitasBody.innerHTML = '';

    // Filtrar y mostrar las citas
    citasOriginales.forEach(cita => {
      if (!fechaFiltrar || cita.fecha === fechaFiltrar) {
        tablaCitasBody.appendChild(cita.rowElement);
      }
    });

    if (tablaCitasBody.rows.length === 0) {
      const noCitasRow = tablaCitasBody.insertRow();
      const noCitasCell = noCitasRow.insertCell();
      noCitasCell.colSpan = 6;
      noCitasCell.textContent = 'No hay citas para la fecha seleccionada.';
      noCitasCell.style.textAlign = 'center';
    }
  });
});

  </script>

</body>
</html>