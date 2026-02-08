<?php

require_once './models/Usuario.php';

class UsuarioController
{
    public function login()
    {
        if ($_POST) {
            $u = new Usuario();
            $usuarios = $u->getByEmail($_POST['email']);
            if ($usuarios) {
                if (password_verify($_POST['contrasenia'], $usuarios['contrasenia'])) {
                    // session_start();
                    // $_SESSION['usuario'] = $usuarios;
                    // header("Location: index.php");
                    echo "Login exitoso";
                } else {
                    echo "Contraseña incorrecta";
                }
            } else {
                echo "Usuario no encontrado";
            }
        }

        require './views/public/login.html';
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
            $contrasenia_cifrada = password_hash($_POST["contrasenia"], PASSWORD_DEFAULT);

            move_uploaded_file($_FILES["imagen"]["tmp_name"],  $rutaCompleta);
            (new Usuario())->save($_POST['username'], $_POST['email'], $contrasenia_cifrada, $rutaCompleta);
            header("Location: index.php");
        }
        require './views/public/registro.html';
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

            $u->update($_GET['id'], $_POST['username'], $_POST['email'], $rutaCompleta);
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
