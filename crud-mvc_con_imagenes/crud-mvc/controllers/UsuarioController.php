<?php

require_once 'models/Usuario.php';

class UsuarioController
{
    public function index()
    {
        $u = new Usuario();
        $usuarios = $u->getAll();
        require 'views/listar.php';
    }
    public function crear()
    {
        /*  La PRIMERA VEZ :
                NO hay POST -> $_POST está vacío -> El if($_POST) NO entra -> Ejecuta el require
            La SEGUNDA VEZ:
                Ahora SÍ hay POST -> $_POST contiene nombre y email -> El if($_POST) SÍ entra ;
                    Guarda en BD y Redirige al listado
        */
        if ($_POST) {
            $directorio = "./img/";

            // Si no existe la carpeta, la creamos
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }

            // // Nombre del archivo subido
            $nombreArchivo = basename($_FILES["imagen"]["name"]);
            // // Luego tú usas esa variable para construir la ruta final:
            $rutaCompleta = $directorio . $nombreArchivo;

            move_uploaded_file($_FILES["imagen"]["tmp_name"],  $rutaCompleta);
            (new Usuario())->save($_POST['nombre'], $_POST['email'], $rutaCompleta);
            header("Location: index.php");
        }
        require 'views/crear.php';
    }
    public function editar()
    {

        $u = new Usuario();
        if ($_POST) {

            $directorio = "./img/";

            // Si no existe la carpeta, la creamos
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }

            // // Nombre del archivo subido
            $nombreArchivo = basename($_FILES["imagen"]["name"]);
            // Luego tú usas esa variable para construir la ruta final:
            $rutaCompleta = $directorio . $nombreArchivo;

            move_uploaded_file($_FILES["imagen"]["tmp_name"],  $rutaCompleta);
            // En DOS pasos como método anterior de crear()

            $u->update($_GET['id'], $_POST['nombre'], $_POST['email'], $rutaCompleta);
            header("Location: index.php");
        }
        $data = $u->getById($_GET['id']);
        require 'views/editar.php';
    }
    public function eliminar()
    {
        (new Usuario())->delete($_GET['id']);
        header("Location: index.php");
    }
}
