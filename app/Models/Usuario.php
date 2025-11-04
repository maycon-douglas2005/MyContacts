<?php

namespace PROJETO\Models;

session_start();

use Exception;
use PROJETO\config\Database;
use PROJETO\Helpers\EmailHelper as Email;

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

    public function cadastrarUsuario()
    {
        try {
            if (Email::validarEmail($this->email) === true) {
                $bd = new Database();
                $querie = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
                $stmt = $bd->realizandoConexao()->prepare($querie);
                $stmt->bindParam(":nome", $this->name);
                $stmt->bindParam(":email", $this->email);
                $stmt->bindParam(":senha", $this->password);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } elseif (Email::validarEmail($this->email) === 2) {
                return 'Formato de email invalido';
            } elseif (Email::validarEmail($this->email) === 3) {
                return 'Dominiod e email invalid';
            } else {
                return '<h1>Erro não identificado</h1>';
            }
        } catch (Exception $e) {
            return $e;
        }
    }

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
    }
}
