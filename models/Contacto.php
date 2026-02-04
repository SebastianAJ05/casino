<?php

require_once './config/conexion.php';

class Contacto
{
    private $db;
    public function __construct()
    {
        $this->db = Database::conectar();
    }
    public function getAll()
    {
        return $this->db->query("SELECT * FROM contactos")->fetchAll();
    }
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM contactos WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function save($nombre, $email,$telefono, $mensaje)
    {
        $stmt = $this->db->prepare("INSERT INTO contactos (nombre, email, telefono, mensaje) VALUES(?,?,?,?)");
        $stmt->execute([$nombre, $email, $telefono, $mensaje]);
    }
    public function update($id, $nombre, $email, $telefono, $mensaje)
    {
        $stmt = $this->db->prepare("UPDATE contactos SET nombre=?,email=?,telefono=?,mensaje=? WHERE id=?");
        $stmt->execute([$nombre, $email, $telefono, $mensaje, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM contactos WHERE id=?");
        $stmt->execute([$id]);
    }
}
