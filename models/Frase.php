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

    public function getRandom()
    {
        return $this->db->query("SELECT * FROM frases ORDER BY RAND() LIMIT 1")->fetch();
    }

    public function getByUser($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM frases_usuario INNER JOIN frases ON frases_usuario.id_frase = frases.id WHERE id_usuario = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    public function deleteByUser($id_usuario, $id_frase)
    {
        $stmt = $this->db->prepare("DELETE FROM frases_usuario WHERE id_usuario = ? AND id_frase = ?");
        $stmt->execute([$id_usuario, $id_frase]);
    }
}
