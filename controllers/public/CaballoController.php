<?php

require_once './models/Caballo.php';
require_once './models/Usuario.php';
require_once './models/Jugada.php';
require_once './config/funciones.php';

class CaballoController
{
    //De aquí sacas los caballos para la carrera
    public function index()
    {
        $c = new Caballo();
        session_start();
        if (comprobarLogin()) {
            $usuario = (new Usuario())->getById($_SESSION['id_usuario']);
            $caballos = $c->getAll();
            $data = json_decode(file_get_contents("php://input"), true);
        }
        require_once "./views/public/carrera.php";
    }

    public function terminarCarrera()
    {
        session_start();
        header('Content-Type: application/json');

        if (!comprobarLogin()) {
            echo json_encode([
                "success" => false,
                "message" => "No autorizado"
            ]);
            exit;
        }

        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data) {
            echo json_encode([
                "success" => false,
                "message" => "Datos inválidos"
            ]);
            exit;
        }

        $idCaballo = $data['id_caballo'];
        $dineroApostado = $data['dinero_apostado'];
        $victoria = $data['victoria'];

        $c = new Caballo();
        $u = new Usuario();
        $j = new Jugada();

        // Si gana
        if ($victoria) {
            $c->ganarCarrera($idCaballo);
            $u->generarMonedas($_SESSION['id_usuario'], $dineroApostado);
        }

        // Si pierde
        else {
            $c->ganarCarrera($idCaballo);
            $u->restarMonedas($_SESSION['id_usuario'], $dineroApostado);
        }

        // Insertar jugada (haz el método en tu modelo)
        $j->save(
            $dineroApostado,
            $victoria ? 1 : 0,
            $_SESSION['id_usuario'],
            $idCaballo ? 1 : 0
        );

        $nuevoDinero = $u->getById($_SESSION['id_usuario'])["dinero"];

        echo json_encode([
            "success" => true,
            "nuevoDinero" => $nuevoDinero
        ]);
    }
}
