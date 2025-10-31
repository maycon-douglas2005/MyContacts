<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PROJETO\Models\Usuario as User;

class ContatoController
{
    public function cadastrar()
    {
        $n = $_POST['name'];
        $e = $_POST['email'];
        $s = $_POST['password'];


        $Usuario = new User($n, $e, $s);

        if ($Usuario->cadastrarUsuario()) {
            echo 'Sucesso ao enviar dados';
        } else {
            echo 'Erro ao enviar dados';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ContatoController = new ContatoController();

    $ContatoController->cadastrar();
}
