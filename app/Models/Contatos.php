<?php

namespace PROJETO\Models;



require_once __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}



use LengthException;
use PROJETO\config\Database as Db;
use PROJETO\Helpers\EmailHelper as Email;
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

    public static function formatarCelularBR($numero)
    {
        $dddsValidos = [
            11,
            12,
            13,
            14,
            15,
            16,
            17,
            18,
            19,
            21,
            22,
            24,
            27,
            28,
            31,
            32,
            33,
            34,
            35,
            37,
            38,
            41,
            42,
            43,
            44,
            45,
            46,
            47,
            48,
            49,
            51,
            53,
            54,
            55,
            61,
            62,
            63,
            64,
            65,
            66,
            67,
            68,
            69,
            71,
            73,
            74,
            75,
            77,
            79,
            81,
            82,
            83,
            84,
            85,
            86,
            87,
            88,
            89,
            91,
            92,
            93,
            94,
            95,
            96,
            97,
            98,
            99
        ];
        if (preg_match("/^(\(\d{2}\)\s?|\d{2}\s?)9\s?\d{4}-?\d{4}$/", $numero)) {
            $numeroLimpo = preg_replace("/\D/", "", $numero);

            $ddd = substr($numeroLimpo, 0, 2);
            $parte1 = substr($numeroLimpo, 2, 5);
            $parte2 = substr($numeroLimpo, 7, 4);

            if (in_array($ddd, $dddsValidos)) {
                return "($ddd) $parte1-$parte2";
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function updateMultiple($d)
    {
        $bd = new Db;

        foreach ($d['registros'] as $registro) {

            $campos = [];
            $valores = [];

            if (isset($registro['nome'])) {
                $campos[] = "nome = :nome";
                $valores[':nome'] = $registro['nome'];
            }

            if (isset($registro['email'])) {
                $email = $registro['email'];

                if (Email::validarEmail($email) === true) {
                    $campos[] = "email = :email";
                    $valores[':email'] = $email;
                } elseif (Email::validarEmail($email) === 2) {
                    return 2; // ERRO FORMATO
                } elseif (Email::validarEmail($email) === 3) {
                    return 3; // ERRO
                }
            }

            if (isset($registro['celular'])) {
                $cel = Contatos::formatarCelularBR($registro['celular']);
                if ($cel === false) {
                    return 4; // ERRO CELULAR
                } else {
                    $campos[] = "celular = :celular";
                    $valores[':celular'] = $cel;
                }
            }

            if (empty($campos)) {
                continue;
            }

            $sql = "UPDATE contatos_usuarios SET " . implode(", ", $campos) . " WHERE id = :id";

            $stmt = $bd->realizandoConexao()->prepare($sql);

            $valores[':id'] = $registro['id'];

            $stmt->execute($valores);
        }

        return true;
    }



    public static function deleteMultiple($d)
    {
        $contatos = $d;

        foreach ($contatos as $cont) {
            $bd = new Db;
            $stmt = $bd->realizandoConexao()->prepare("DELETE FROM contatos_usuarios WHERE email = :email");
            $stmt->bindValue(":email", $cont);

            if (!$stmt->execute()) {
                return false;
            }
        }
        return true;
    }
}
