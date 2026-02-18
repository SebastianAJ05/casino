<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Registro | Casino</title>
    <link rel="stylesheet" href="./css/registro.css" />
    <link rel="stylesheet" href="./css/comun.css" />
  </head>
  <body>
    <a href="./index.php" class="casino-back">⬅ Volver al Casino</a>

    <main class="auth-container">
      <h1>Registro</h1>

      <?php
        if (isset($salida)) {
          echo "<p class='error-message'>$salida</p>";
        }
      ?>
      <form method="post" class="auth-form" enctype="multipart/form-data">
        <label for="user">Nombre de usuario</label>
        <input type="text" id="user" name="username" required />

        <label for="email">Correo electrónico</label>
        <input type="email" id="email"  name="email" required />

        <label for="contrasenia">Contraseña</label>
        <input type="password" id="contrasenia" name="contrasenia" required />

        <label for="contrasenia2">Repetir contraseña</label>
        <input type="password" id="contrasenia2" name="contrasenia2" required />

        <label for="avatar">Avatar</label>
        <input
          type="file"
          id="avatar"
          name="imagen"
          class="file-input"
          accept="image/*"
        />

        <button type="submit">Crear cuenta</button>
      </form>

      <p class="auth-extra">
        ¿Ya tienes cuenta?
        <a href="frontController.php?accion=login&controller=Usuario&carpeta=public">Inicia sesión</a>
      </p>
    </main>
  </body>
</html>