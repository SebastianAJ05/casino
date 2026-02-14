<?php

require_once './models/Frase.php';

class FraseController
{

    public function index()
    {
        if (!new Usuario()->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: index.php?carpeta=admin&accion=login&controller=Usuario");
            exit();
        }
        $frases = (new Frase())->getAll();
        require './views/admin/frases/listar.php';
    }
    public function editar()
    {

        if (!new Usuario()->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: index.php?carpeta=admin&accion=login&controller=Usuario");
            exit();
        }
        $f = new Frase();
        if ($_POST) {

            $f->update($_GET['id'], $_POST['frase'], $_POST['autor']);
            header("Location: index.php?carpeta=admin&accion=index&controller=Frase");
        }
        $frase = $f->getById($_GET['id']);
        require './views/admin/frases/editar.php';
    }
    public function eliminar()
    {
        if (!new Usuario()->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: index.php?carpeta=admin&accion=login&controller=Usuario");
            exit();
        }
        (new Frase())->delete($_GET['id']);
        header("Location: index.php?carpeta=admin&accion=index&controller=Frase");
    }

    public function crear()
    {
        if (!new Usuario()->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: index.php?carpeta=admin&accion=login&controller=Usuario");
            exit();
        }
        if ($_POST) {
            (new Frase())->save($_POST['frase'], $_POST['autor']);
            header("Location: index.php?carpeta=admin&accion=index&controller=Frase");
        }
        require './views/admin/frases/crear.php';
    }
}
