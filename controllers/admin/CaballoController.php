<?php

require_once './models/Caballo.php';
require_once './models/Usuario.php';
require_once './config/funciones.php';

class CaballoController
{

    public function index()
    {
        session_start();
        if (!(new Usuario())->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: ./frontController.php?carpeta=admin&accion=login&controller=Usuario");
            exit();
        }
        $caballos = (new Caballo())->getAll();
        require './views/admin/caballos/listar.php';
    }
    public function editar()
    {
session_start();
        if (!(new Usuario())->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: ./frontController.php?carpeta=admin&accion=login&controller=Usuario");
            exit();
        }
        $f = new Caballo();
        if ($_POST) {

            $rutaCompleta = subirImagen($_FILES['ruta_imagen'], $_POST['imagen_actual']);

            $f->update($_GET['id'], $_POST['nombre'], $_POST['color'], $rutaCompleta);
            header("Location: ./frontController.php?carpeta=admin&accion=index&controller=Caballo");
        }
        $caballo = $f->getById($_GET['id']);
        require './views/admin/caballos/editar.php';
    }
    public function eliminar()
    {
        session_start();
        if (!(new Usuario())->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: ./frontController.php?carpeta=admin&accion=login&controller=Usuario");
            exit();
        }
        (new Caballo())->delete($_GET['id']);
        header("Location: ./frontController.php?carpeta=admin&accion=index&controller=Caballo");
    }

    public function crear()
    {
        session_start();
        if (!(new Usuario())->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: ./frontController.php?carpeta=admin&accion=login&controller=Usuario");
            exit();
        }
        if ($_POST) {

            $rutaCompleta = subirImagen($_FILES['ruta_imagen'], $_POST['imagen_actual']);
            (new Caballo())->save($_POST['nombre'], $_POST['color'], $rutaCompleta);
            header("Location: ./frontController.php?carpeta=admin&accion=index&controller=Caballo");
        }
        require './views/admin/caballos/crear.php';
    }
}
