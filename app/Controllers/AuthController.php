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

        

        if (User::loginUsuario($e, $s)) {
            header('Location: ../Views/contacts/listaDeContatos.php?sucessoLogin=true');
            exit;
        }

        if (!isset($_SESSION['erro_campo_vazio'])) {
                $_SESSION['erro_campo_vazio'] = true;
            }
        header('Location: ../Views/auth/login.php?erroLogin=true');
        exit;
    }
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    AuthController::login();
}

