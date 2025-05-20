<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú Principal</title>
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      height: 100vh;
      background-color: #000;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
      color: white;
    }

    .menu {
      display: flex;
      flex-direction: row;
      gap: 80px;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
    }

    .menu a {
      text-decoration: none;
      color: white;
      text-align: center;
      font-size: 18px;
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .menu a i {
      font-size: 48px;
      margin-bottom: 10px;
      transition: all 0.3s ease;
    }

    .menu a:hover i {
      color: #00a2ff;
      text-shadow: 0 0 10px #00a2ff, 0 0 20px #00a2ff, 0 0 30px #00a2ff;
      transform: scale(1.1);
    }

    .menu a:hover {
      color: #00a2ff;
    }
  </style>
</head>
<body>

  <div class="menu">
    <a href="{{ route('user.index') }}">
      <i class="fas fa-user"></i>
      Portal Usuario
    </a>
    <a href="{{ route('barbers.index') }}">
      <i class="fas fa-cut"></i>
      Portal Barbero
    </a>
    <a href="{{ route('crud.index') }}">
      <i class="fas fa-tools"></i>
      Portal Administrador
    </a>
    <a href="{{ route('login') }}">
      <i class="fas fa-sign-out-alt"></i>
      Cerrar Sesión
    </a>
  </div>

</body>
</html>
