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
        return $this->db->query("SELECT username, email, dinero, ruta_imagen FROM usuarios WHERE isAdmin = 0")->fetchAll();
    }
    public function getByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email=?");
        $stmt->execute([$email]);
        $usuario_buscar = $stmt->fetch(PDO::FETCH_ASSOC);
        if (filter_var($usuario_buscar, FILTER_VALIDATE_BOOLEAN) === false && $usuario_buscar === false) {
            return false;
        } else if (count($usuario_buscar) > 0) {
            return $usuario_buscar;
        }
    }
    public function save($username, $email, $contrasenia, $ruta_imagen)
    {
        $stmt = $this->db->prepare("INSERT INTO usuarios (username, email, contrasenia, ruta_imagen) VALUES(?,?,?,?)");
        $stmt->execute([$username, $email, $contrasenia, $ruta_imagen]);
    }
    public function update($id, $username, $email, $ruta_imagen)
    {
        $stmt = $this->db->prepare("UPDATE usuarios SET username = ?,email = ?,ruta_imagen = ? WHERE id = ?");
        $stmt->execute([$username, $email, $ruta_imagen, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->execute([$id]);
    }

    public function getAdmin($email){
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = ? AND isAdmin = 1");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
