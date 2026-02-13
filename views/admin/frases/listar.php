<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frases registradas</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <h2 class="admin-section-title">Frases registradas</h2>

    <a href="./views/admin/index.html" class="btn-volver-admin">
        ← Volver al panel
    </a>
    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Frase</th>
                    <th>Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($frases as $frase): ?>
                    <tr>

                        <td><?php echo htmlspecialchars($frase['frase']); ?></td>
                        <td><?php echo htmlspecialchars($frase['autor']); ?></td>


                        <td class="acciones">
                            <a href="index.php?controller=Frase&carpeta=admin&accion=editar&id=<?php echo urlencode($frase['id']); ?>" class="btn-edit">
                                Editar
                            </a>

                            <a href="index.php?controller=Frase&carpeta=admin&accion=eliminar&id=<?php echo urlencode($frase['id']); ?>" class="btn-delete">
                                Borrar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a href="index.php?controller=Frase&accion=crear&carpeta=admin" class="btn-crear-algo">
        ✦ Crear nueva frase
    </a>


</body>

</html>