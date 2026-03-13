<?php

namespace PROJETO\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use PROJETO\Models\Usuario as User;
use PROJETO\Models\Usuario;

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

    public static function logout()
    {

        Usuario::logoutUser();
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    AuthController::login();
}

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['logout'])) {
    AuthController::logout();
}
