<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <h2 class="admin-section-title">Editar usuario</h2>

    <div class="edit-container">

        <form method="post" action="" class="edit-form" enctype="multipart/form-data">

            <!-- Avatar actual -->
            <div class="edit-avatar">
                <img
                    src="<?php echo htmlspecialchars($usuario['ruta_imagen'] ?? './img/sin_foto.webp'); ?>"
                    alt="Avatar actual"
                    id="preview-avatar">
            </div>

            <!-- Subir nueva imagen -->
            <label for="ruta_imagen">Cambiar avatar</label>
            <input
                type="file"
                id="ruta_imagen"
                name="ruta_imagen"
                accept="image/*"
                class="file-input-admin">

            <!-- Usuario -->
            <label for="username">Nombre de usuario</label>
            <input
                type="text"
                id="username"
                name="username"
                value="<?php echo htmlspecialchars($usuario['username']); ?>"
                required>

            <!-- Email (SOLO LECTURA) -->
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?php echo htmlspecialchars($usuario['email']); ?>"
                readonly
                class="readonly">

            <!-- Dinero -->
            <label for="dinero">Dinero</label>
            <input
                type="number"
                id="dinero"
                name="dinero"
                value="<?php echo htmlspecialchars($usuario['dinero']); ?>"
                min="0"
                required>

            <!-- Campo oculto si usas username como clave -->
            <input
                type="hidden"
                name="id"
                value="<?php echo htmlspecialchars($usuario['id']); ?>">
            <input
                type="hidden"
                name="imagen_actual"
                value="<?php echo htmlspecialchars($usuario['ruta_imagen']); ?>">


            <div class="edit-actions">
                <a href="./frontController.php?controller=Usuario&action=index&carpeta=admin" class="btn-cancel">Cancelar</a>
                <button type="submit" class="btn-save">Guardar cambios</button>
            </div>

        </form>

    </div>

</body>

</html>