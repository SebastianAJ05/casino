<!doctype html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <!-- Codificación UTF-8 universal -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Responsive -->
  <meta
    name="keywords"
    content="proyecto, trabajo, desarrollo, curso, informatica, web, DAW" />
  <!-- Palabras clave para el SEO -->
  <meta name="author" content="Sebastián" />
  <!-- Autor de la página -->
  <meta name="description" content="Este el index del proyecto final" />
  <!-- Descripción de mi página -->
  <title>El Casino de la noche</title>
  <!-- Título de mi página -->
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/responsive.css" />
  <?php session_start(); ?>
</head>

<body>
  <header class="casino-header">
    <div class="header-left">
      <span class="logo">🎰 El Casino de la noche</span>
    </div>

    <nav class="header-nav">
      <a href="./index.php">Inicio</a>
      <a href="./views/faqs.html">FAQs</a>
      <a href="./frontController.php?accion=crear&controller=Contacto">Contacto</a>
      <a href="./views/sobre_nosotros.html">Sobre nosotros</a>
    </nav>

    <div class="header-right">
    <?php if (isset($_SESSION['id_usuario'])): ?>

      <!-- DROPDOWN USUARIO -->
      <div class="user-dropdown" id="userToggle">
        <button class="user-button">
          <img src="<?= htmlspecialchars($_SESSION['foto_perfil'] ?? './img/sin_foto.webp') ?>" alt="Tu foto de perfil" class="user-avatar"> ▼
        </button>

        <div class="dropdown-menu" id="userMenu">
          <a href="./frontController.php?carpeta=public&accion=editar&controller=Usuario&id=<?= $_SESSION['id_usuario'] ?>">Mi perfil</a>
          <a href="./frontController.php?carpeta=public&accion=index&controller=Frase">Mis frases</a>
          <a href="./config/cerrar_sesion.php">Cerrar sesión</a>
        </div>
      </div>

    <?php else: ?>


      <a
        href="./frontController.php?accion=login&controller=Usuario&carpeta=public"
        class="login">Iniciar sesión</a>
      <a
        href="./frontController.php?accion=crear&controller=Usuario&carpeta=public"
        class="register">Registro</a>


    <?php endif; ?>

    </div>

  </header>

  <main>
    <section class="intro">
      <h2>Bienvenido al casino</h2>
      <p>
        No es un sitio para curiosos. Aquí se apuesta dinero, orgullo y un
        poco de dignidad.
      </p>
    </section>

    <section class="games">
      <article class="game-card">
        <h3>Carreras de Caballos</h3>
        <p>
          Cuatro caballos. Una meta. Apuesta bien o vuelve a casa andando.
        </p>
        <?php if (isset($_SESSION['id_usuario'])): ?>
        <a href="./frontController.php?carpeta=public&accion=index&controller=Caballo">Entrar</a>
        <?php else: ?>
        <a href="./views/public/carrera_caballos.html">Entrar</a>
        <?php endif; ?>
      </article>

      <article class="game-card">
        <h3>Generar monedas</h3>
        <p>Consigue una moneda solo por esperar unos segundos</p>
        <a href="./frontController.php?carpeta=public&accion=generarMoneda&controller=Usuario">Entrar</a>
      </article>

      <article class="game-card">
        <h3>El juego de la tabla</h3>
        <p>Aquí no pierdes ni ganas dinero. Solo diviértete 😉😜</p>
        <a href="./views/public/tabla.html">Entrar</a>
      </article>

      <article class="game-card">
        <h3>Adivina el Personaje</h3>
        <p>
          Adivina el personaje de la API de Dragon Ball. Si aciertas, ganas
          monedas. Si no, las pierdes
        </p>
        <a href="./frontController.php?carpeta=public&accion=adivinarPersonaje&controller=Usuario">Entrar</a>
      </article>
      <article class="game-card phrases-card">
        <h3>Frases del Casino</h3>
        <p>
          Gasta tus monedas en frases legendarias. Presume, vacila o humilla
          con estilo.
        </p>
        <a href="./frontController.php?carpeta=public&accion=canjear&controller=Frase">Entrar</a>
      </article>
    </section>
  </main>

  <footer>
    <p>El Casino de la noche © 2025</p>
    <p class="warning">Apostar puede arruinarte. O hacerte leyenda.</p>
  </footer>
</body>
<script src="./js/dropdown.js"></script>
</html>