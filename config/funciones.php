<?php
function sanear($campo): string
{
    $campo = htmlspecialchars($campo);
    $campo = trim($campo);
    $campo = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $campo);
    return $campo;
}

function comprobarLogin(): bool
{
    return isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] != null;
}

function cerrarSesion($ruta): void
{
    session_start();
    session_destroy();
    header("location: $ruta");
    exit;
}
