<?php

require_once './config/conexion.php';

class Caballo
{
    private $db;
    public function __construct()
    {
        $this->db = Database::conectar();
    }
    public function getAll()
    {
        return $this->db->query("SELECT * FROM caballos")->fetchAll();
    }
    public function save($nombre, $color, $ruta_imagen)
    {
        $stmt = $this->db->prepare("INSERT INTO caballos (nombre, color, victorias, ruta_imagen) VALUES(?,?,?,?)");
        $stmt->execute([$nombre, $color, 0, $ruta_imagen]);
    }
    public function update($id, $nombre, $color, $ruta_imagen)
    {
        $stmt = $this->db->prepare("UPDATE caballos SET nombre = ?,color = ?,ruta_imagen = ? WHERE id = ?");
        $stmt->execute([$nombre, $color, $ruta_imagen, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM caballos WHERE id= ?");
        $stmt->execute([$id]);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM caballos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function ganarCarrera($id)
    {
        $stmt = $this->db->prepare("UPDATE caballos SET victorias = victorias + 1 WHERE id = ?");
        $stmt->execute([$id]);
    }
}
