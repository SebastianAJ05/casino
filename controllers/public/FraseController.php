<?php

require_once './models/Frase.php';
require_once './models/Usuario.php';
require_once './config/funciones.php';
require_once './config/conexion.php';

class FraseController
{

    public function index()
    {
        session_start();

        if (!comprobarLogin()) {
            header("Location: ./views/denegado.html");
            exit();
        }
        $misFrases = (new Frase())->getByUser($_SESSION['id_usuario']);
        require './views/public/frases.php';
    }
    public function eliminar()
    {
        (new Frase())->delete($_GET['id']);
        header("Location: frontController.php?carpeta=public&accion=index&controller=Frase");
    }

    public function canjear()
    {
        session_start();
        if (!comprobarLogin()) {
            header("Location: ./views/denegado.html");
            exit();
        }
        $usuario = (new Usuario())->getById($_SESSION['id_usuario']);
        $db = Database::conectar();
        $db->beginTransaction();
        if ($_POST) {
            try {
                if ($usuario["dinero"] < 50) {
                    $salida = "No tienes suficientes monedas.";
                } else {
                    // 1 Descontar monedas
                    $descontado = (new Usuario())->restarMonedas($_SESSION['id_usuario'], 50);

                    if (!$descontado) {
                        $salida = "No tienes monedas suficientes.";
                        $db->rollBack();
                    } else {
                        // 2 Obtener frase que no tenga
                        $frase = new Frase();
                        $canjeada = $frase->obtenerFraseDisponible($_SESSION['id_usuario']);
                        var_dump($canjeada);

                        if (!$canjeada) {
                            $salida = "Ya tienes todas las recompensas.";
                            $db->rollBack();
                        }

                        // 3 Asignarla
                        if ($frase->asignarFrase($_SESSION['id_usuario'], $canjeada['id'])) $db->commit();
                        else $db->rollBack();

                        return $frase;
                    }
                }
            } catch (PDOException $e) {
                $salida = $e->getMessage();
                $db->rollBack();
                throw $e;
            }
        }
        require './views/public/generar_frase.php';
    }
}
