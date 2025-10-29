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
        $Usuario->cadastrarUsuario();
        if ($Usuario->cadastrarUsuario()) {
            echo 'Sucesso';
        } else {
            echo 'Erro';
        }
    }
}
