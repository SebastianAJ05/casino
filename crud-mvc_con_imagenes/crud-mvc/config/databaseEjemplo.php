<?php
class Database {

    public static function connect() {
        try {
            $host = "localhost";
            $db   = "crud";
            $user = "root";
            $pass = "";

            $pdo = new PDO(
                "mysql:host=$host;dbname=$db;charset=utf8",
                $user,
                $pass
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;

        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}

/*
USO en el modelo:
    $this->db = Database::connect();

Por qué esta es la mejor opción ??
    MVC limpio.
    Manejo de errores.
    PDO bien configurado.
    Reutilizable y mantenible.

Esta es la forma estándar en proyectos reales.
*/


