<?php

require_once 'config/database.php';

class Usuario
{
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
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
    public function save($nombre, $email, $ruta_imagen)
    { // Carpeta donde se guardarán las imágenes
        $stmt = $this->db->prepare("INSERT INTO usuarios (username, email, img_path) VALUES(?,?,?)");
        $stmt->execute([$nombre, $email, $ruta_imagen]);
    }
    public function update($id, $nombre, $email, $ruta_imagen)
    {
        $stmt = $this->db->prepare("UPDATE usuarios SET username=?,email=?,img_path=? WHERE id=?");
        $stmt->execute([$nombre, $email, $ruta_imagen, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->execute([$id]);
    }
}
