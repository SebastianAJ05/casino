<?php
// Variables esperadas:
// $usuario['username']
// $usuario['ruta_imagen']
// $usuario['dinero']
// $salida
// $frase
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Generar Frase</title>
    <link rel="stylesheet" href="./css/generarFrase.css">
    <link rel="stylesheet" href="./css/comun.css">
</head>

<body>
    <a href="./index.php" class="casino-back"> ⬅ Volver al Casino </a>
    <div class="frase-container">

        <!-- PERFIL USUARIO -->
        <div class="perfil-usuario">
            <img src="<?= htmlspecialchars($usuario['ruta_imagen']) ?>" class="avatar">
            <h2 class="username"><?= htmlspecialchars($usuario['username']) ?></h2>
            <div class="dinero">
                💰 <?= htmlspecialchars($usuario['dinero']) ?>
            </div>
        </div>

        <h1 class="titulo">🎰 Frase Misteriosa 🎰</h1>

        <div class="precio-frase">
            Precio: <span class="precio-cantidad">50</span> monedas
        </div>

        <?php if (!isset($canjeada["frase"])) : ?>

            <form method="POST">
                <button type="submit" name="generar" class="btn-generar">
                    CONSEGUIR FRASE
                </button>
            </form>

            <?php if (!empty($salida)) : ?>
                <div class="mensaje-error">
                    <?= htmlspecialchars($salida) ?>
                </div>
            <?php endif; ?>

        <?php else : ?>

            <div class="carta-frase">
                <p class="texto-frase">
                    “<?= htmlspecialchars($canjeada['frase']) ?>”
                </p>
                <span class="autor-frase">
                    — <?= htmlspecialchars($canjeada['autor']) ?>
                </span>
            </div>

            <form method="POST">
                <button type="submit" name="generar" class="btn-otra">
                    OTRA FRASE
                </button>
            </form>

        <?php endif; ?>

    </div>

</body>

</html>