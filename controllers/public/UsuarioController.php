<?php

require_once './models/Usuario.php';
require_once './config/funciones.php';

class UsuarioController
{
    public function login()
    {
        if ($_POST) {
            $u = new Usuario();
            $usuario_buscar = $u->getByEmail($_POST['email']);
            if ($usuario_buscar) {
                if (password_verify($_POST['contrasenia'], $usuario_buscar['contrasenia'])) {
                    session_start();
                    $_SESSION['id_usuario'] = $usuario_buscar['id'];
                    $_SESSION['foto_perfil'] = $usuario_buscar['ruta_imagen'];
                    $salida = "Login exitoso";
                    header("Location: index.php");
                } else {
                    $salida = "Contraseña incorrecta";
                }
            } else {
                $salida = "Usuario no encontrado";
            }
        }

        require './views/public/login.php';
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

            $rutaCompleta = subirImagen($_FILES['ruta_imagen'], $_POST['imagen_actual']);
            $contrasenia_cifrada = password_hash($_POST["contrasenia"], PASSWORD_DEFAULT);

            move_uploaded_file($_FILES["imagen"]["tmp_name"],  $rutaCompleta);
            (new Usuario())->save($_POST['username'], $_POST['email'], $contrasenia_cifrada, $rutaCompleta);
            header("Location: index.php");
        }
        require './views/public/registro.php';
    }
    public function editar()
    {
        session_start();
        // if (!comprobarLogin()) {
        //     header("Location: frontController.php?carpeta=public&accion=login&controller=Usuario");
        //     exit();
        // }
        $u = new Usuario();
        if ($_POST) {

            $rutaCompleta = subirImagen($_FILES['ruta_imagen'], $_POST['imagen_actual']);

            $u->updateByUser($_GET['id'], $_POST['username'], $_POST['email'], $rutaCompleta);
            session_start();
            $_SESSION['foto_perfil'] = $rutaCompleta;
            header("Location: index.php?carpeta=public&accion=index&controller=Usuario");
        }
        $usuario = $u->getById($_GET['id']);
        require './views/public/perfil.php';
    }

    public function generarMoneda()
    {
        $u = new Usuario();
        session_start();
        $usuario = $u->getById($_SESSION['id_usuario']);
        $data = json_decode(file_get_contents("php://input"), true);
        if ($data) {
            header('Content-Type: application/json');

            if ($data['exito']) {
                $u->generarMonedas($_SESSION['id_usuario'], 1);
            }

            if ($u) {
                echo json_encode([
                    "success" => true,
                    "nuevoDinero" => $u->getById($_SESSION['id_usuario'])
                ]);
            } else {
                echo json_encode([
                    "success" => false,
                    "message" => "No autorizado"
                ]);
            }
        }

        require_once "./views/public/generar_monedas.php";
    }

    public function getUser($id)
    {
        $u = new Usuario();
        return $u->getById($id);
    }

    public function adivinarPersonaje()
    {
        $u = new Usuario();
        session_start();
        $usuario = $u->getById($_SESSION['id_usuario']);

        $data = json_decode(file_get_contents("php://input"), true);
        if ($data) {
            header('Content-Type: application/json');

            if ($data['exito']) {
                $u->generarMonedas($_SESSION['id_usuario'], 5);
            } else {
                $u->restarMonedas($_SESSION['id_usuario'], 5);
            }

            if ($u) {
                echo json_encode([
                    "success" => true,
                    "nuevoDinero" => $u->getById($_SESSION['id_usuario'])
                ]);
            } else {
                echo json_encode([
                    "success" => false,
                    "message" => "No autorizado"
                ]);
            }
        }
        require_once './views/public/dragonBall.php';
    }
}
