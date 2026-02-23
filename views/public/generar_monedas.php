<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Coin Generator</title>
  <link rel="stylesheet" href="./css/generar_monedas.css" />
</head>

<body>
  <main class="coin-machine">
    <h1 class="title">Máquina de Fichas</h1>
    <p class="subtitle">El tiempo también paga.</p>

    <div class="coin-display">
      <span class="coin-icon">🪙</span>
      <span id="dinero_usuario" class="coin-count"><?php echo $usuario['dinero'] ?? 0; ?></span>
    </div>

    <div class="progress-container">
      <progress class="progress-bar" min="0" max="100" value="0"></progress>
    </div>

    <!-- BOTÓN (si es botón) -->
    <button id="generar" class="generate-btn">Generar moneda</button>
    <p>
      Monedas que has generado aquí: <span id="monedas_generadas">0</span>
    </p>
    <!-- OPCIÓN IMAGEN (por si luego cambias) -->
    <!--
    <img
      src="img/coin.png"
      id="generar"
      class="coin-image"
      alt="Generar moneda"
    />
    -->
    <a href="./index.php" class="casino-back"> ⬅ Volver al Casino </a>
  </main>

  <script src="./js/generar_monedas.js"></script>
</body>

</html>