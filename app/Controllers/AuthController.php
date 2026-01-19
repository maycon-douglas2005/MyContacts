<?php

namespace PROJETO\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

use PROJETO\Models\Usuario as User;



class AuthController
{
    public static function login()
    {
        $e = $_POST['email'];
        $s = $_POST['password'];


        if (User::verificacaoCamposPreenchidos($e, $s)) {
            if (User::loginUsuario($e, $s)) {
                header('Location: ../Views/contacts/listaDeContatos.php?sucessoLogin=true');
                exit;
            }

            header('Location: ../Views/auth/login.php?erroEmail=true');
            exit;
        }
        header('Location: ../Views/auth/login.php?erroCamposVaziosLogin=true');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    AuthController::login();
}
