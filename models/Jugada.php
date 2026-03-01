<?php

require_once './config/conexion.php';
//Cambia todo
class Jugada
{
    private $db;
    public function __construct()
    {
        $this->db = Database::conectar();
    }
    public function getAll()
    {
        return $this->db->query("SELECT * FROM jugadas")->fetchAll();
    }
    public function save($dinero_apostado, $victoria, $id_usuario, $id_caballo)
    {
        $stmt = $this->db->prepare("INSERT INTO jugadas (dinero_apostado, victoria, id_usuario, id_caballo) VALUES(?,?,?,?)");
        $stmt->execute([$dinero_apostado, $victoria, $id_usuario, $id_caballo]);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM jugadas WHERE id_jugada = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
