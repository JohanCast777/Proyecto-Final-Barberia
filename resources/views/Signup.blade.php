<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registro de Usuario</title>
  <link rel="stylesheet" href="styles.css"/>
  <link rel="shortcut icon" href="/peluqueria.ico" type="image/x-icon">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: "Segoe UI", sans-serif;
    }

    body, html {
      height: 100%;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
    }

    .container {
      display: flex;
      min-height: 100vh;
      width: 100%;
    }

    .left-panel {
      flex: 1;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      padding: 60px;
      background: linear-gradient(135deg, #8e2de2, #4a00e0);
    }

    .left-panel h1 {
      font-size: 3em;
      margin-bottom: 20px;
    }

    .left-panel p {
      font-size: 1.2em;
      line-height: 1.6;
      max-width: 400px;
    }

    .right-panel {
      flex: 1;
      background-color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 60px 40px;
    }

    form {
      width: 100%;
      max-width: 400px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    h2 {
      margin-bottom: 20px;
      color: #4a00e0;
      text-align: center;
    }

    label {
      font-size: 0.95em;
      color: #555;
      margin-bottom: 5px;
      display: flex;
      flex-direction: column;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="password"],
    select {
      padding: 12px 16px;
      border: 1px solid #ccc;
      border-radius: 10px;
      background: #f9f9f9;
      font-size: 1em;
      transition: 0.3s ease;
      width: 100%;
    }

    input:focus,
    select:focus {
      border-color: #6a11cb;
      background: #fff;
      outline: none;
      box-shadow: 0 0 5px rgba(106, 17, 203, 0.3);
    }

    button {
      padding: 14px;
      background: linear-gradient(to right, #6a11cb, #2575fc);
      border: none;
      border-radius: 10px;
      color: white;
      font-size: 1em;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
    }

    button:hover {
      transform: scale(1.02);
      box-shadow: 0 4px 15px rgba(106, 17, 203, 0.3);
    }

    .register-link {
      text-align: center;
      margin-top: 20px;
      font-size: 0.95em;
      color: #555;
    }

    .register-link a {
      color: #6a11cb;
      font-weight: bold;
      text-decoration: none;
    }

    .register-link a:hover {
      text-decoration: underline;
    }

    /* Estilos específicos para el select */
    .role-select {
      margin-top: 5px;
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .left-panel, .right-panel {
        flex: none;
        width: 100%;
        padding: 40px 20px;
        text-align: center;
      }

      .left-panel {
        align-items: center;
      }

      .left-panel p {
        max-width: none;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="left-panel">
      <h1>Únete a nuestra comunidad</h1>
      <p>Regístrate para acceder a todas las funcionalidades de nuestra plataforma. Es rápido y fácil.</p>
    </div>
    <div class="right-panel">
      <form>
        <h2>Registro</h2>
        <label for="nombre">Nombre completo</label>
        <input type="text" id="nombre" required>
    
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" required>
    
        <label for="usuario">Nombre de usuario</label>
        <input type="text" id="usuario" required>
    
        <label for="password">Contraseña</label>
        <input type="password" id="password" required>
    
        <label for="confirm-password">Confirmar contraseña</label>
        <input type="password" id="confirm-password" required>
        
        <label for="role">Rol
          <select id="role" name="role" class="role-select" required>
            <option value="" disabled selected>Selecciona tu rol</option>
            <option value="user">Usuario</option>
            <option value="barber">Barbero</option>
          </select>
        </label>

        <button type="submit">Registrarse</button>
    
        <div class="register-link">
          ¿Ya tienes cuenta? <a href="{{ route('Login') }}">Inicia sesión</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>