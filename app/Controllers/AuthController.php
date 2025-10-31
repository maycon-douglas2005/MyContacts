<?php

namespace PROJETO\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

use PROJETO\Models\Usuario as User;

$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];

class AuthController
{
    public function login()
    {
        $Usuario = new User($_SESSION['email'], $_SESSION['password']);

        if ($Usuario->loginUsuario()) {
            header('Location: ../Views/contacts/listaDeContatos.php');
        } else {
            echo 'Nao foi possivel logar';
        }
    }
}

$AuthController = new AuthController();
$AuthController->login();
