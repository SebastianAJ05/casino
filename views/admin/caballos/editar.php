<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Caballo</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <h2 class="admin-section-title">Editar caballo</h2>

    <div class="edit-container">

        <form method="post" action="" class="edit-form" enctype="multipart/form-data">

            <!-- Avatar actual -->
            <div class="edit-avatar">
                <img
                    src="<?php echo htmlspecialchars($caballo['ruta_imagen']); ?>"
                    alt="Avatar actual"
                    id="preview-avatar">
            </div>

            <!-- Subir nueva imagen -->
            <label for="ruta_imagen">Cambiar Imagen</label>
            <input
                type="file"
                id="ruta_imagen"
                name="ruta_imagen"
                accept="image/*"
                class="file-input-admin">

            <!-- Usuario -->
            <label for="nombre">Nombre del caballo</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="<?php echo htmlspecialchars($caballo['nombre']); ?>"
                required>

            <!-- Victorias (SOLO LECTURA) -->
            <label for="victorias">Victorias</label>
            <input
                type="number"
                id="victorias"
                name="victorias"
                value="<?php echo htmlspecialchars($caballo['victorias']); ?>"
                readonly
                class="readonly">

            <!-- Color -->
            <label for="color">Color</label>
            <input
                type="text"
                id="color"
                name="color"
                value="<?php echo htmlspecialchars($caballo['color']); ?>"
                required>

            <!-- Campo oculto si usas username como clave -->
            <input
                type="hidden"
                name="id"
                value="<?php echo htmlspecialchars($caballo['id']); ?>">
            <input
                type="hidden"
                name="imagen_actual"
                value="<?php echo htmlspecialchars($caballo['ruta_imagen']); ?>">


            <div class="edit-actions">
                <a href="./frontController.php?controller=Caballo&action=index&carpeta=admin" class="btn-cancel">Cancelar</a>
                <button type="submit" class="btn-save">Guardar cambios</button>
            </div>

        </form>

    </div>

</body>

</html>