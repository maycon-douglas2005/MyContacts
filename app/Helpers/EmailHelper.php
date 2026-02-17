<?php

namespace PROJETO\Helpers;

use PROJETO\config\Database as Db;

class EmailHelper
{
    public const ERRO_FORMATO_INVALIDO = 2;
    public const ERRO_DOMINIO_INVALIDO = 3;

    public static function validarEmail(string $email): int|bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return self::ERRO_FORMATO_INVALIDO;
        }
        $dominio = substr(strchr($email, "@"), 1);

        return checkdnsrr($dominio, "MX") ? true : self::ERRO_DOMINIO_INVALIDO;
    }

    public static function verificacaoEmailCadastrado($email)
    {
        $bd = new Db();
        $stmt = $bd->realizandoConexao()->prepare("SELECT email FROM contatos_usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return false;
        }
        return true;
    }
}
