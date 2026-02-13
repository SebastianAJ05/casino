<?php

require_once './models/Caballo.php';
require_once './config/funciones.php';

class CaballoController
{

    public function index()
    {
        $caballos = (new Caballo())->getAll();
        require './views/admin/caballos/listar.php';
    }
    public function editar()
    {

        $f = new Caballo();
        if ($_POST) {

            $rutaCompleta = subirImagen($_FILES['ruta_imagen'], $_POST['imagen_actual']);

            $f->update($_GET['id'], $_POST['nombre'], $_POST['color'], $rutaCompleta);
            header("Location: index.php?carpeta=admin&accion=index&controller=Caballo");
        }
        $caballo = $f->getById($_GET['id']);
        require './views/admin/caballos/editar.php';
    }
    public function eliminar()
    {
        (new Caballo())->delete($_GET['id']);
        header("Location: index.php?carpeta=admin&accion=index&controller=Caballo");
    }

    public function crear()
    {
        if ($_POST) {

            $rutaCompleta = subirImagen($_FILES['ruta_imagen'], $_POST['imagen_actual']);
            (new Caballo())->save($_POST['nombre'], $_POST['color'], $rutaCompleta);
            header("Location: index.php?carpeta=admin&accion=index&controller=Caballo");
        }
        require './views/admin/caballos/crear.php';
    }
}
