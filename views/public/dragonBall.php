<!doctype html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dragon Ball - Personajes</title>
  <link rel="stylesheet" href="./css/dragonBall.css" />
</head>

<body>
  <h1>Personajes de Dragon Ball</h1>
  <img src="" alt="Foto del personaje" id="imagenPersonaje" />
  <div id="botones"></div>
  <div id="hud-dinero">
    <span class="hud-label">Zenis</span>
    <span id="dinero_usuario"><?php echo $usuario['dinero']; ?></span>
  </div>

  <div id="mensaje-db" class="mensaje-db oculto">
    <span id="mensaje-texto"></span>
  </div>
  <button class="btn-otra-vez" id="btn-otra-vez">
    ⚡ Otra vez
  </button>
  <a href="./index.php" class="casino-back"> ⬅ Volver al Casino </a>

  <script src="./js/dragonBall.js"></script>
</body>

</html>