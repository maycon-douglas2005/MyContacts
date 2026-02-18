<?php

namespace PROJETO\Models;

session_start();

use Exception;
use PROJETO\config\Database;
use PROJETO\Helpers\EmailHelper as Email;
use PDO;

class Usuario
{
    private $name;
    private $email;
    private $password;

    public const ERRO_EMAIL_CADASTRADO = 4;
    public const ERRO_INESPERADO = 5;

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



    public static function verificacaoCamposPreenchidos($e, $s, $n = null)
    {


        if (empty($e) || empty($s) || empty($n) && $n != null) {

            return false;
        }

        return true;
    }

    private function verificacaoEmailCadastrado($email)
    {
        $bd = new Database();
        $stmt = $bd->realizandoConexao()->prepare("SELECT email FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return false;
        }
        return true;
    }

    public function cadastrarUsuario()
    {
        $resultadoValidarEmail = Email::validarEmail($this->email);
        $resultadoEmailCadastrado = $this->verificacaoEmailCadastrado($this->email);

        try {
            if ($resultadoValidarEmail === true) {
                if ($resultadoEmailCadastrado === false) {
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
                } else {
                    return self::ERRO_EMAIL_CADASTRADO;
                }
            } elseif ($resultadoValidarEmail === 2) {
                return 2; //ERRO_FORMATO_INVALIDO
            } elseif ($resultadoValidarEmail === 3) {
                return 3; //ERRO_DOMINIO_INVALIDO
            }
        } catch (Exception $e) {
            
            return self::ERRO_INESPERADO;
        }
    }

    public function getId($email){
        $db = new Database;
        $stmt = $db->realizandoConexao()->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function loginUsuario($e, $s)
    {
        $bd = new Database();
        $querie = "SELECT * FROM usuarios WHERE email =  :email";
        $stmt = $bd->realizandoConexao()->prepare($querie);
        $stmt->bindParam(":email", $e);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($s, $usuario['senha'])) {

                $_SESSION['usuario'] = [
                    "id" => $usuario['id'],
                    "nome" => $usuario['nome'],
                    "email" => $usuario['email']
                ];

                return true;
            }
            return false;
        }
        return false;
    }
}
