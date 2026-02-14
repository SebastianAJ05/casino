<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios registrados</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <h2 class="admin-section-title">Usuarios registrados</h2>

    <a href="./views/admin/index.html" class="btn-volver-admin">
        ← Volver al panel
    </a>

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Dinero</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td>
                            <img
                                src="<?php echo htmlspecialchars($usuario['ruta_imagen']); ?>"
                                alt="Avatar"
                                class="admin-avatar">
                        </td>

                        <td><?php echo htmlspecialchars($usuario['username']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>

                        <td class="dinero">
                            <?php echo htmlspecialchars($usuario['dinero']); ?> 💰
                        </td>

                        <td class="acciones">
                            <a href="frontController.php?controller=Usuario&carpeta=admin&accion=editar&id=<?php echo urlencode($usuario['id']); ?>" class="btn-edit">
                                Editar
                            </a>

                            <a href="frontController.php?controller=Usuario&carpeta=admin&accion=eliminar&id=<?php echo urlencode($usuario['id']); ?>" class="btn-delete">
                                Borrar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>