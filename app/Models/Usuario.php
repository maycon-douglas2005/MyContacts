<?php

namespace PROJETO\Models;

// session_start();

use Exception;
use PROJETO\config\Database;
use PROJETO\Helpers\EmailHelper as Email;
use PDO;

class Usuario
{
    private $name;
    private $email;
    private $password;

    public function __construct($email = null, $password = null, $name = null)
    {
        if ($name && $email && $password) {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        } else {
            $this->email = $email;
            $this->password = $password;
        }
    }

    public function __toString()
    {
        return "Nome: {$this->name} | Email: {$this->email} | Senha: {$this->password}";
    }

    public static function verificacaoCamposPreenchidos($e, $s, $n)
    {
        if (empty($e) || empty($s) || empty($n)) {
            return false;
        }
        return true;
    }

    public function cadastrarUsuario()
    {
        $resultadoValidarEmail = Email::validarEmail($this->email);
        try {
            if ($resultadoValidarEmail === true) {

                $bd = new Database();

                $querie = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
                $stmt = $bd->realizandoConexao()->prepare($querie);
                $stmt->bindParam(":nome", $this->name);
                $stmt->bindParam(":email", $this->email);
                $stmt->bindValue(":senha", password_hash($this->password, PASSWORD_DEFAULT));

                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } elseif ($resultadoValidarEmail === 2) {
                return false;
            } elseif ($resultadoValidarEmail === 3) {
                return false;
            } else {
                return '<h1>Erro não identificado</h1>';
            }
        } catch (Exception $e) {
            return $e;
        }
    }
    /* 
    public function loginUsuario()
    {
        $bd = new Database();
        $querie = "SELECT nome FROM usuarios WHERE email =  :email AND senha = :senha";
        $stmt = $bd->realizandoConexao()->prepare($querie);
        $stmt->bindParam(":email", $_SESSION['email']);
        $stmt->bindParam(":senha", $_SESSION['senha']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }*/
}
