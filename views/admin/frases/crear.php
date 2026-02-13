<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Frase</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <h2 class="admin-section-title">Crear nueva frase</h2>

    <a href="./index.php?controller=Frase&action=index&carpeta=admin" class="btn-volver-admin">
        ← Volver a la lista de frases
    </a>

    <div class="edit-container">

        <form method="post" action="" class="edit-form" enctype="multipart/form-data">

            <!-- Frase -->
            <label for="frase">Frase</label>
            <input
                type="text"
                id="frase"
                name="frase"
                required>

            <!-- Autor -->
            <label for="autor">Autor</label>
            <input
                type="text"
                id="autor"
                name="autor">

            <div class="edit-actions">
                <a href="./index.php?controller=Frase&action=index&carpeta=admin" class="btn-cancel">Cancelar</a>
                <button type="submit" class="btn-save">Guardar frase</button>
            </div>

        </form>

    </div>
</body>

</html>