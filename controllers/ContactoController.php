<?php

require_once './models/Contacto.php';
include_once './config/funciones.php';

class ContactoController
{
    public function index()
    {
        $c = new Contacto();
        $contactos = $c->getAll();
        require './views/contacto.php';
    }
    public function crear()
    {
        if ($_POST) {
            (new Contacto())->save(
                sanear($_POST['nombre']),
                sanear($_POST['email']),
                sanear($_POST["telefono"]),
                sanear($_POST["mensaje"])
            );
            // header("Location: index.php");

            
        }
        require './views/contacto.php';
    }
    public function editar()
    {

        $c = new Contacto();


        $c->update($_GET['id'], $_POST['nombre'], $_POST['email'], $_POST["telefono"], $_POST["mensaje"]);
        header("Location: index.php");

        $data = $c->getById($_GET['id']);
        require 'views/editar.php';
    }
    public function eliminar()
    {
        (new Contacto())->delete($_GET['id']);
        header("Location: index.php");
    }
}
