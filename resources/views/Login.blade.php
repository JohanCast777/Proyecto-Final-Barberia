<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <link rel="icon" type="image/x-icon" href="/peluqueria.ico">
  <link rel="stylesheet" href="styles.css"/>
  <style>
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: "Segoe UI", sans-serif;
  }
  
  body, html {
    height: 100%;
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
  }
  
  .container {
    display: flex;
    height: 100vh;
    width: 100%;
  }
  
  .left-panel {
    flex: 1;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 60px;
    background: linear-gradient(135deg, #8e2de2, #4a00e0);
  }
  
  .left-panel h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
  }
  
  .left-panel p {
    font-size: 1em;
    line-height: 1.6;
  }
  
  .right-panel {
    flex: 1;
    background-color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 40px;
  }
  
  .right-panel h2 {
    margin-bottom: 30px;
    color: #4a00e0;
    
  }
  
  form {
    width: 100%;
    max-width: 320px;
    display: flex;
    flex-direction: column;
  }

  label {
    display: block;
    margin-bottom: 5px;
    font-size: 1.0em;
    color: #89819a;
    margin-top: 2px;
    text-align: center;
  }
  
  input[type="text"],
  input[type="email"],
  input[type="date"],
  input[type="password"] {
    padding: 8px;
    margin-bottom: 15px;
    border: none;
    border-radius: 15px;
    border-style:outset;
    background: #f0f0f0;
    outline: none;
    padding-left: 20px;
  }
  
  .options {
    display: flex;
    margin-top: 10px;
    justify-content: space-between;
    align-items: center;
    font-size: 0.9em;
    margin-bottom: 20px;
  }
  
  .options a {
    color: #4a00e0;
    text-decoration: none;
  }
  
  button {
    padding: 12px;
    background: linear-gradient(to right, #6a11cb, #2575fc);
    border: none;
    border-radius: 15px;
    color: white;
    font-weight: bold;
    cursor: pointer;
    margin-top: 10px;
    transition: 0.3s ease;
  }

  
  button:hover {
    opacity: 0.9;
  }

  .register-link {
    text-align: center;
    margin-top: 15px;
    font-size: 0.95em;
  }
  
  .register-link a {
    color: #6a11cb;
    font-weight: bold;
    text-decoration: none;
  }
  
  .register-link a:hover {
    text-decoration: underline;
  }

  </style>
</head>
<body>
    
  <div class="container">
    <div class="left-panel">
      <h1>Bienvenido a Leo's Barber</h1>
      <p>Tu estilo, nuestra pasión. Inicia sesión para reservar tu cita y disfrutar de una experiencia premium en barbería.</p>
    </div>
    <div class="right-panel">
      <h2>Iniciar Sesión</h2>
      <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <input type="email" name="email" placeholder="Correo Electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <div class="options">
            <a href="#">Forgot password?</a>
          </div>
        <button type="submit">Entrar</button>
        <div class="register-link">
            ¿No tienes cuenta? <a href="{{ route('Signup') }}">Regístrate aquí</a>
          </div>
      </form>

</html>

