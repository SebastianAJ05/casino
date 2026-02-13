<?php

require_once './config/conexion.php';

class Frase
{
    private $db;
    public function __construct()
    {
        $this->db = Database::conectar();
    }
    public function getAll()
    {
        return $this->db->query("SELECT * FROM frases")->fetchAll();
    }
    public function save($frase, $autor)
    {
        $stmt = $this->db->prepare("INSERT INTO frases (frase, autor) VALUES(?, ?)");
        $stmt->execute([$frase, $autor]);
    }
    public function update($id, $frase, $autor)
    {
        $stmt = $this->db->prepare("UPDATE frases SET frase = ?,autor = ? WHERE id = ?");
        $stmt->execute([$frase, $autor, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM frases WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM frases WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
