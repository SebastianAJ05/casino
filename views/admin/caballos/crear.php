<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Caballo</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <h2 class="admin-section-title">Crear nuevo caballo</h2>

    <a href="./frontController.php?controller=Caballo&action=index&carpeta=admin" class="btn-volver-admin">
        ← Volver a la lista de caballos
    </a>

    <div class="edit-container">

        <form method="post" action="" class="edit-form" enctype="multipart/form-data">

            <!-- Nombre -->
            <label for="nombre">Nombre</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                required>

            <!-- Color -->
            <label for="color">Color</label>
            <input
                type="text"
                id="color"
                name="color"
                required>

            <!-- Ruta de imagen -->
            <label for="ruta_imagen">Ruta de imagen</label>
            <input
                type="file"
                id="ruta_imagen"
                name="ruta_imagen"
                required>

            <div class="edit-actions">
                <a href="./frontController.php?controller=Caballo&action=index&carpeta=admin" class="btn-cancel">Cancelar</a>
                <button type="submit" class="btn-save">Guardar caballo</button>
            </div>

        </form>

    </div>
</body>

</html>