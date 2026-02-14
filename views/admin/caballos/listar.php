<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caballos registrados</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <h2 class="admin-section-title">Caballos registrados</h2>

    <a href="./views/admin/index.html" class="btn-volver-admin">
        ← Volver al panel
    </a>
    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Nombre</th>
                    <th>Color</th>
                    <th>Victorias</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($caballos as $caballo): ?>
                    <tr>

                        <td>
                            <img
                                src="<?php echo htmlspecialchars($caballo['ruta_imagen']); ?>"
                                alt="Avatar"
                                class="admin-avatar">
                        </td>
                        <td><?php echo htmlspecialchars($caballo['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($caballo['color']); ?></td>
                        <td><?php echo htmlspecialchars($caballo['victorias']); ?></td>


                        <td class="acciones">
                            <a href="frontController.php?controller=Caballo&carpeta=admin&accion=editar&id=<?php echo urlencode($caballo['id']); ?>" class="btn-edit">
                                Editar
                            </a>

                            <a href="frontController.php?controller=Caballo&carpeta=admin&accion=eliminar&id=<?php echo urlencode($caballo['id']); ?>" class="btn-delete">
                                Borrar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a href="frontController.php?controller=Caballo&accion=crear&carpeta=admin" class="btn-crear-algo">
        ✦ Crear nuevo caballo
    </a>


</body>

</html>