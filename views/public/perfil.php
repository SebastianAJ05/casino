<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="./css/perfil.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/comun.css">
</head>

<body>
    <a href="./index.php" class="casino-back">⬅ Volver al Casino</a>
    <h2 class="perfil-title">Editar perfil</h2>

    <div class="perfil-container">

        <form method="post" action="" enctype="multipart/form-data" class="perfil-form">

            <!-- Avatar actual -->
            <div class="perfil-avatar">
                <img
                    src="<?php echo htmlspecialchars($usuario['ruta_imagen']); ?>"
                    alt="Avatar actual"
                    id="preview-avatar">
            </div>

            <label for="ruta_imagen">Cambiar avatar</label>
            <input
                type="file"
                id="ruta_imagen"
                name="ruta_imagen"
                accept="image/*"
                class="file-input-user">

            <!-- Usuario -->
            <label for="username">Nombre de usuario</label>
            <input
                type="text"
                id="username"
                name="username"
                value="<?php echo htmlspecialchars($usuario['username']); ?>"
                required>

            <!-- Email editable -->
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?php echo htmlspecialchars($usuario['email']); ?>"
                required>

            <!-- Dinero (solo visual) -->
            <div class="perfil-dinero">
                <span>Tu dinero</span>
                <strong><?php echo htmlspecialchars($usuario['dinero']); ?> 💰</strong>
            </div>

            <input
                type="hidden"
                name="imagen_actual"
                value="<?php echo htmlspecialchars($usuario['ruta_imagen']); ?>">

            <button type="submit" class="btn-guardar-perfil">
                Guardar cambios
            </button>

        </form>

    </div>

</body>

</html>