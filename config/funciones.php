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

function subirImagen($archivoSubido, $archivoAntiguo): string
{
    $directorio = "./img/";

    // Si no existe la carpeta, la creamos
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }
    if (!empty($archivoSubido['name'])) {

        // Se ha subido nueva imagen
        // Nombre del archivo subido
        $nombreArchivo = basename($archivoSubido["name"]);
        $rutaTemporal = $archivoSubido['tmp_name'];
        // Luego tú usas esa variable para construir la ruta final:
        $rutaCompleta = $directorio . $nombreArchivo;
        move_uploaded_file($rutaTemporal, $rutaCompleta);
    } else {
        // No se ha subido imagen → mantener la anterior
        $rutaCompleta = $archivoAntiguo;
    }
    return $rutaCompleta;
}
