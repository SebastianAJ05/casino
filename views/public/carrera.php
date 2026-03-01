<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Carrera de Caballos</title>
  <link rel="stylesheet" href="./css/carrera_caballos.css">
</head>
<body>

<h1>Elige el caballo por el que quieras apostar</h1>

<p>Tu dinero: <span id="dinero_usuario"><?= $usuario["dinero"] ?? 'ERROR' ?></span> monedas</p>

<?php foreach ($caballos as $caballo): ?>
  <div 
    id="<?= $caballo['nombre'] ?>" 
    data-id="<?= $caballo['id'] ?>"
    style="border: 3px solid <?= $caballo['color'] ?>;"
  >

    <h3 style="color: <?= $caballo['color'] ?>;">
      <?= $caballo['nombre'] ?>
    </h3>

    <img 
      src="<?= $caballo['ruta_imagen'] ?>" 
      alt="<?= $caballo['nombre'] ?>"
      style="border: 4px solid <?= $caballo['color'] ?>; border-radius:10px;"
    >

    <button 
      style="
        background: <?= $caballo['color'] ?>;
        border: 2px solid <?= $caballo['color'] ?>;
        color: #000;
      "
    >
      Apostar por <?= $caballo['nombre'] ?>
    </button>

  </div>
  <br>
<?php endforeach; ?>

<section>
  <output id="apuesta"></output>

  <label for="dinero_apostado">¿Cuánto quieres apostar?</label>

  <input type="number" id="dinero_apostado" value="0">

  <button id="run">CORRER</button>
  <button id="reset">Resetear</button>
</section>

<a href="index.php" class="casino-back">⬅ Volver al Casino</a>

<script src="./js/carrera_caballos_log.js"></script>
</body>
</html>
