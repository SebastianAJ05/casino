<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Frase</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <h2 class="admin-section-title">Editar frase</h2>

    <div class="edit-container">

        <form method="post" action="" class="edit-form" enctype="multipart/form-data">

            <!-- Frase -->
            <label for="frase">Frase</label>
            <input
                type="text"
                id="frase"
                name="frase"
                value="<?php echo htmlspecialchars($frase['frase']); ?>"
                required>

            <!-- Email (SOLO LECTURA) -->
            <label for="autor">Autor</label>
            <input
                type="text"
                id="autor"
                name="autor"
                value="<?php echo htmlspecialchars($frase['autor']); ?>"
                >



            <div class="edit-actions">
                <a href="./frontController.php?controller=Frase&action=index&carpeta=admin" class="btn-cancel">Cancelar</a>
                <button type="submit" class="btn-save">Guardar cambios</button>
            </div>

        </form>

    </div>

</body>

</html>