<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrera de Caballos</title>
    <link rel="stylesheet" href="css/carrera_caballos.css" />
</head>

<body>
    <!-- chat -->
    <section class="carrera-container">

        <div class="caballos-grid">

            <?php foreach ($caballos as $caballo): ?>
                <div class="caballo-card" data-id="<?= $caballo['id'] ?>">

                    <img src="<?= $caballo['imagen'] ?>" alt="<?= $caballo['nombre'] ?>" class="caballo-img">

                    <h3 class="caballo-nombre"><?= $caballo['nombre'] ?></h3>

                    <div class="caballo-stats">
                        Victorias: <?= $caballo['victorias'] ?>
                    </div>

                    <?php if ($logueado): ?>
                        <button class="btn-apostar" data-id="<?= $caballo['id'] ?>">
                            Apostar
                        </button>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>

        </div>

        <?php if ($logueado): ?>
            <div class="panel-apuesta">

                <label for="cantidad">Cantidad a apostar</label>
                <input type="number" id="cantidad" min="1" placeholder="Introduce monedas">

                <button id="btn-correr" class="btn-correr">
                    Iniciar carrera
                </button>

            </div>
        <?php endif; ?>

        <div id="resultadoCarrera" class="resultado-carrera"></div>
        <!-- Mio -->
    </section>
    <h1 class="carrera-title">Elige el caballo por el que quieras apostar</h1>
    <div class="info-usuario">
        <span class="saldo-label">Tu saldo:</span>
        <span class="saldo-cantidad"><?= $usuario["dinero"] ?? 100 ?> monedas</span>
    </div>
    <div id="Zeus">
        <h3>Zeus</h3>
        <img src="./img/zeus.webp" alt="Caballo 1" />
        <button>Apostar por Zeus</button>
    </div>
    <br />
    <div id="Centella">
        <h3>Centella</h3>
        <img src="./img/centella.webp" alt="Caballo 2" />
        <button>Apostar por Centella</button>
    </div>
    <br />
    <div id="Rapidash">
        <h3>Rapidash</h3>
        <img src="./img/rapidash.webp" alt="Caballo 3" />
        <button>Apostar por Rapidash</button>
    </div>
    <br />
    <div id="Pegasus">
        <h3>Pegasus</h3>
        <img src="./img/pegasus.webp" alt="Caballo 4" />
        <button>Apostar por Pegasus</button>
    </div>

    <br />
    <section>
        <output id="apuesta"></output>
        <label for="dinero_apostado">¿Cuánto quieres apostar?</label>
        <input
            type="number"
            name="dinero_apostado"
            id="dinero_apostado"
            value="0" />
        <button id="run">CORRER</button>
        <button id="reset">Resetear</button>
    </section>

    <a href="index.php" class="casino-back"> ⬅ Volver al Casino </a>

    <script src="./js/carrera_caballos.js"></script>
</body>

</html>