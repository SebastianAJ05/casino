<?php

require_once './models/Usuario.php';

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
                    header("Location: views/admin/index.php");
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

            $directorio = "./img/";

            // Si no existe la carpeta, la creamos
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }
            if (!empty($_FILES['ruta_imagen']['name'])) {

                // Se ha subido nueva imagen
                // Nombre del archivo subido
                $nombreArchivo = basename($_FILES["ruta_imagen"]["name"]);
                $rutaTemporal = $_FILES['ruta_imagen']['tmp_name'];
                // Luego tú usas esa variable para construir la ruta final:
                $rutaCompleta = $directorio . $nombreArchivo;
                move_uploaded_file($rutaTemporal, $rutaCompleta);
            } else {

                // No se ha subido imagen → mantener la anterior
                $rutaCompleta = $_POST['imagen_actual'];
            }

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
