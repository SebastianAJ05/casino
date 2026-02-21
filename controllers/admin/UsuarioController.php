<?php

require_once './models/Usuario.php';
require_once './config/funciones.php';

class UsuarioController
{
    public function login()
    {
        if ($_POST) {
            $u = new Usuario();
            $admin_buscar = $u->getAdmin($_POST["email"]);
            if ($admin_buscar) {
                if (password_verify($_POST["contrasenia"], $admin_buscar["contrasenia"])) {
                    session_start();
                    $_SESSION['id_usuario'] = $admin_buscar['id'];
                    header("Location: views/admin/index.html");
                    $salida = "Login exitoso";
                } else {
                    $salida = "Contraseña incorrecta";
                }
            } else {
                $salida = "Usuario no encontrado o no es administrador";
            }
        }

        require './views/admin/login.php';
    }

    public function index()
    {
        session_start();
        if (!(new Usuario())->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: index.php?carpeta=admin&accion=login&controller=Usuario");
            exit();
        }
        $usuarios = (new Usuario())->getAll();
        require './views/admin/usuarios/listar.php';
    }
    public function editar()
    {
        session_start();
        if (!(new Usuario())->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: ./frontController.php?controller=Usuario&action=login&carpeta=admin");
            exit();
        }
        $u = new Usuario();
        if ($_POST) {

            $rutaCompleta = subirImagen($_FILES['ruta_imagen'], $_POST['imagen_actual']);

            $u->updateByAdmin($_GET['id'], $_POST['username'], $_POST['email'], $_POST['dinero'], $rutaCompleta);
            header("Location: ./frontController.php?controller=Usuario&action=index&carpeta=admin");
        }
        $usuario = $u->getById($_GET['id']);
        require './views/admin/usuarios/editar.php';
    }
    public function eliminar()
    {
        session_start();
        if (!(new Usuario())->comprobarAdmin($_SESSION['id_usuario'])) {
            header("Location: ./frontController.php?controller=Usuario&action=login&carpeta=admin");
            exit();
        }
        (new Usuario())->delete($_GET['id']);
        header("Location: ./frontController.php?controller=Usuario&action=index&carpeta=admin");
    }
}
