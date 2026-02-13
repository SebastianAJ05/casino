<?php

require_once './models/Frase.php';

class FraseController
{

    public function index()
    {
        $frases = (new Frase())->getAll();
        require './views/admin/frases/listar.php';
    }
    public function editar()
    {

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
        (new Frase())->delete($_GET['id']);
        header("Location: index.php?carpeta=admin&accion=index&controller=Frase");
    }

    public function crear()
    {
        if ($_POST) {
            (new Frase())->save($_POST['frase'], $_POST['autor']);
            header("Location: index.php?carpeta=admin&accion=index&controller=Frase");
        }
        require './views/admin/frases/crear.php';
    }
}
