<?php

require_once './models/Frase.php';
require_once './models/Usuario.php';

class FraseController
{

    public function index()
    {
        session_start();
        if (!(new Usuario())->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: ./views/prohibido.html");
            exit();
        }
        $frases = (new Frase())->getAll();
        require './views/admin/frases/listar.php';
    }
    public function editar()
    {
        session_start();
        if (!(new Usuario())->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: ./views/prohibido.html");
            exit();
        }
        $f = new Frase();
        if ($_POST) {

            $f->update($_GET['id'], $_POST['frase'], $_POST['autor']);
            header("Location: ./frontController.php?carpeta=admin&accion=index&controller=Frase");
        }
        $frase = $f->getById($_GET['id']);
        require './views/admin/frases/editar.php';
    }
    public function eliminar()
    {
        session_start();
        if (!(new Usuario())->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: ./views/prohibido.html");
            exit();
        }
        (new Frase())->delete($_GET['id']);
        header("Location: ./frontController.php?carpeta=admin&accion=index&controller=Frase");
    }

    public function crear()
    {
        session_start();
        if (!(new Usuario())->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: ./views/prohibido.html");
            exit();
        }
        if ($_POST) {
            (new Frase())->save($_POST['frase'], $_POST['autor']);
            header("Location: ./frontController.php?carpeta=admin&accion=index&controller=Frase");
        }
        require './views/admin/frases/crear.php';
    }
}
