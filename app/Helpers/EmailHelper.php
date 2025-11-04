<?php

namespace PROJETO\Helpers;

class EmailHelper
{
    public const ERRO_FORMATO_INVALIDO = 2;
    public const ERRO_DOMINIO_INVALIDO = 3;

    public static function validarEmail(string $email): mixed
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return self::ERRO_FORMATO_INVALIDO;
        } else {
            $dominio = substr(strchr($email, "@"), 1);
            if (checkdnsrr($dominio, "MX")) {
                return true;
            } else {
                return self::ERRO_DOMINIO_INVALIDO;
            }
        }
    }
}
