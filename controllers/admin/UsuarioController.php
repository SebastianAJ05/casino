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
                    // session_start();
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
        $usuarios = (new Usuario())->getAll();
        require './views/admin/usuarios/listar.php';
    }
    public function editar()
    {

        $u = new Usuario();
        if ($_POST) {

            $rutaCompleta = subirImagen($_FILES['ruta_imagen'], $_POST['imagen_actual']);

            $u->updateByAdmin($_GET['id'], $_POST['username'], $_POST['email'], $_POST['dinero'], $rutaCompleta);
            header("Location: index.php?carpeta=admin&accion=index&controller=Usuario");
        }
        $usuario = $u->getById($_GET['id']);
        require './views/admin/usuarios/editar.php';
    }
    public function eliminar()
    {
        (new Usuario())->delete($_GET['id']);
        header("Location: index.php?carpeta=admin&accion=index");
    }
}
