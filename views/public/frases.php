<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis frases</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/frases.css">
    <link rel="stylesheet" href="./css/comun.css">
</head>

<body>
    <a href="./index.php" class="casino-back">⬅ Volver al Casino</a>
    <h2 class="mis-frases-title">Mis frases</h2>

    <div class="mis-frases-container">

        <?php if (empty($misFrases)): ?>

            <div class="sin-frases">
                <p>Aún no tienes frases.</p>
                <span>Ve al casino y consigue alguna 😉</span>
            </div>

        <?php else: ?>

            <?php foreach ($misFrases as $frase): ?>

                <div class="frase-card">

                    <p class="frase-texto">
                        "<?php echo htmlspecialchars($frase['frase']); ?>"
                    </p>

                    <p class="frase-autor">
                        — <?php echo htmlspecialchars($frase['autor']); ?>
                    </p>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</body>

</html>