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
      gap: 15px;
    }

    h2 {
      margin-bottom: 20px;
      color: #4a00e0;
      text-align: center;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      margin-bottom: 5px;
    }

    label {
      font-size: 0.95em;
      color: #555;
      margin-bottom: 5px;
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

    /* Estilos para las alertas de error */
    .alert-container {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1000;
      max-width: 350px;
      width: 100%;
    }

    .alert {
      padding: 15px 20px;
      margin-bottom: 15px;
      border-radius: 8px;
      color: white;
      font-size: 0.95em;
      display: flex;
      align-items: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      animation: slideIn 0.3s ease-out forwards;
      position: relative;
      overflow: hidden;
    }

    .alert-danger {
      background: linear-gradient(135deg, #ff4d4d, #ff1a1a);
      border-left: 5px solid #cc0000;
    }

    .alert:before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 5px;
      background-color: rgba(255, 255, 255, 0.3);
    }

    .alert-close {
      margin-left: auto;
      background: none;
      border: none;
      color: white;
      font-size: 1.2em;
      cursor: pointer;
      opacity: 0.7;
      transition: opacity 0.2s;
      padding: 0 0 0 10px;
    }

    .alert-close:hover {
      opacity: 1;
    }

    /* Errores de campo específicos */
    .error-message {
      color: #ff1a1a;
      font-size: 0.8em;
      margin-top: 5px;
      padding-left: 5px;
      animation: fadeIn 0.3s ease-out;
    }

    .input-error {
      border-color: #ff4d4d !important;
    }

    @keyframes slideIn {
      from {
        transform: translateX(100%);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes fadeOut {
      to {
        opacity: 0;
        transform: translateY(-20px);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-5px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
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
      
      .alert-container {
        top: 10px;
        right: 10px;
        left: 10px;
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
      <form action="{{ route('signup.process') }}" method="POST">        
        @csrf <!-- Token CSRF necesario para proteger el formulario -->
        <h2>Registro</h2>
        
        <!-- Campo para el nombre -->
        <div class="form-group">
          <label for="first_name">Nombre</label>
          <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="@error('first_name') input-error @enderror" required>
          @error('first_name')
            <div class="error-message">{{ $message }}</div>
          @enderror
        </div>

        <!-- Campo para el apellido -->
        <div class="form-group">
          <label for="last_name">Apellido</label>
          <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="@error('last_name') input-error @enderror" required>
          @error('last_name')
            <div class="error-message">{{ $message }}</div>
          @enderror
        </div>

        <!-- Campo para el correo electrónico -->
        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" class="@error('email') input-error @enderror" required>
          @error('email')
            <div class="error-message">{{ $message }}</div>
          @enderror
        </div>

        <!-- Campo para el teléfono -->
        <div class="form-group">
          <label for="phone">Teléfono</label>
          <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="@error('phone') input-error @enderror" required>
          @error('phone')
            <div class="error-message">{{ $message }}</div>
          @enderror
        </div>

        <!-- Campo para la contraseña -->
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" class="@error('password') input-error @enderror" required>
          @error('password')
            <div class="error-message">{{ $message }}</div>
          @enderror
        </div>

        <!-- Campo para confirmar la contraseña -->
        <div class="form-group">
          <label for="password_confirmation">Confirmar contraseña</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <!-- Campo oculto para el rol -->
        <input type="hidden" name="role" value="client">

        <!-- Botón para enviar el formulario -->
        <button type="submit">Registrarse</button>

        <!-- Enlace para iniciar sesión si ya tiene cuenta -->
        <div class="register-link">
          ¿Ya tienes cuenta? <a href="{{ route('main') }}">Inicia sesión</a>
        </div>
      </form>
    </div>
  </div>

  @if ($errors->any() && !$errors->has('first_name') && !$errors->has('last_name') && !$errors->has('email') && !$errors->has('phone') && !$errors->has('password') && !$errors->has('role'))
    <div class="alert-container">
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
          {{ $error }}
          <button class="alert-close" onclick="this.parentElement.style.animation='fadeOut 0.3s forwards'; setTimeout(() => this.parentElement.remove(), 300)">×</button>
        </div>
      @endforeach
    </div>
  @endif

  <script>
    // Cierra automáticamente las alertas después de 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
      const alerts = document.querySelectorAll('.alert');
      alerts.forEach(alert => {
        setTimeout(() => {
          alert.style.animation = 'fadeOut 0.3s forwards';
          setTimeout(() => alert.remove(), 300);
        }, 5000);
      });
    });
  </script>
</body>
</html>