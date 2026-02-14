<?php

// 1- Selecciono el controlador:
// Lee ?c= de la URL.
// Si no existe, usa Usuario por defecto.
$controller = $_GET['controller'] ?? '';
// 2- Selecciono la acción:
// Lee ?a= de la URL.
// Si no existe, llama a index().
$accion = $_GET['accion'] ?? 'index';

$carpeta = $_GET['carpeta'] ?? ''; //Aquí añadiré si el controller esta en una carpeta mas profunda

if ($controller == '') {
    header('location: index.html');
}
if ($carpeta == "") {
    require_once 'controllers/' . $controller . 'Controller.php';
} else {
    require_once 'controllers/' . $carpeta . "/" . $controller . 'Controller.php';
}
// 3- Carga el controlador:
// Incluye el archivo del controlador elegido.


// 4- Crea la instancia:
// Construye el nombre de la clase dinámicamente.
// Crea el objeto controlador.
$controllerName = $controller . 'Controller';
$controller = new $controllerName();
// 5- Ejecuta la acción:
// Llama al método indicado (index, crear, editar, etc.).
$controller->$accion();

/*
Ejemplo real:
URL:
    index.php?c=Usuario&a=editar

Ejecuta:
    UsuarioController->editar();

Eso es el FRONT CONTROLLER en MVC.


EXPLICACIÓN FINAL:
    “No cambiamos de página, cambiamos de vista dentro del mismo flujo, y el controlador decide cuál mostrar.”
    Flujo correcto:
        Vista → controlador → modelo → controlador → vista

*/