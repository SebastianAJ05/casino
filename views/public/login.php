<!doctype html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Iniciar sesión | Casino</title>
  <link rel="stylesheet" href="./css/login.css" />
  <link rel="stylesheet" href="./css/comun.css" />
</head>

<body>
  <a href="./index.html" class="casino-back">⬅ Volver al Casino</a>

  <main class="auth-container">
    <?php
    if (isset($salida)) {
      echo "<p class='form-message error'>$salida</p>";
    }
    ?>
    <h1>Iniciar sesión</h1>

    <form class="auth-form" method="post">
      <label for="email">Correo electrónico</label>
      <input type="email" name="email" id="email" required />

      <label for="password">Contraseña</label>
      <input type="password" name="contrasenia" id="contrasenia" required />

      <button type="submit">Entrar</button>
    </form>

    <p class="auth-extra">
      ¿No tienes cuenta?
      <a href="index.php?accion=crear&controller=Usuario&carpeta=public">Regístrate</a>
    </p>
    <a href="index.php?accion=login&controller=Usuario&carpeta=admin" class="admin-link"> Acceso administrador </a>
  </main>
</body>

</html>