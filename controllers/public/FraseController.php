<?php

require_once './models/Frase.php';
require_once './config/funciones.php';

class FraseController
{

    public function index()
    {
        session_start();

        //     if (!comprobarLogin()) {
        //         header("Location: frontController.php?carpeta=public&accion=login&controller=Usuario");
        //         exit();
        //     }
        $misFrases = (new Frase())->getByUser($_SESSION['id_usuario']);
        require './views/public/frases.php';
    }
    public function eliminar()
    {
        (new Frase())->delete($_GET['id']);
        header("Location: frontController.php?carpeta=public&accion=index&controller=Frase");
    }
}
