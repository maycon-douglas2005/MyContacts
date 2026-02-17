<?php

namespace PROJETO\Models;

require_once __DIR__ . '/../../vendor/autoload.php';
session_start();

use PROJETO\config\Database as Db;
use PROJETO\Helpers\EmailHelper;
use PDO;

class Contatos
{
    private $nome;
    private $email;
    private $celular;
    public function __construct($nome, $email, $celular)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->celular = $celular;
    }

    public function save()
    {
        $bd = new Db;
        $stmt = $bd->realizandoConexao()->prepare("INSERT INTO contatos_usuarios (id_usuario, nome, email, celular)  VALUES (:id_usuario, :nome, :email, :celular)");
        $stmt->bindValue(":id_usuario", $_SESSION['usuario']['id']);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":celular", $this->celular);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function getAll()
    {
        $bd = new Db;
        $stmt = $bd->realizandoConexao()->prepare("SELECT * FROM contatos_usuarios WHERE id_usuario = :id_usuario");
        $stmt->bindValue(":id_usuario", $_SESSION['usuario']['id']);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
}
