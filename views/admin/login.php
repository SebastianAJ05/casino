<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link rel="stylesheet" href="./css/loginAdmin.css">
  <link rel="stylesheet" href="./css/comun.css">
</head>

<body>

  <main class="admin-login-container">
    <?php
    if (isset($salida)) {
      echo "<p class='form-message error'>$salida</p>";
    }
    ?>
    <h1>Acceso Administrador</h1>

    <form class="admin-login-form" method="post">
      <label for="admin-user">Usuario</label>
      <input type="email" id="admin-user" name="email" required>

      <label for="admin-pass">Contraseña</label>
      <input type="password" id="admin-pass" name="contrasenia" required>

      <button type="submit">Entrar</button>
    </form>

    <a href="./index.html" class="back-link">← Volver al casino</a>
  </main>

</body>

</html>