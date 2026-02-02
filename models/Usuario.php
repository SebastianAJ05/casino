<?php

require_once './config/conexion.php';

class Usuario
{
    private $db;
    public function __construct()
    {
        $this->db = Database::conectar();
    }
    public function getAll()
    {
        return $this->db->query("SELECT * FROM usuarios")->fetchAll();
    }
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function save($username, $email,$contrasenia, $ruta_imagen)
    {
        $stmt = $this->db->prepare("INSERT INTO usuarios (username, email, contrasenia, ruta_imagen) VALUES(?,?,?,?)");
        $stmt->execute([$username, $email, $contrasenia, $ruta_imagen]);
    }
    public function update($id, $username, $email, $ruta_imagen)
    {
        $stmt = $this->db->prepare("UPDATE usuarios SET username=?,email=?,ruta_imagen=? WHERE id=?");
        $stmt->execute([$username, $email, $ruta_imagen, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->execute([$id]);
    }
}
