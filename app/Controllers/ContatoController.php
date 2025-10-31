<?php

use PROJETO\Models\Usuario as User;

require_once __DIR__ . '/../../vendor/autoload.php';



class ContatoController
{
    public function cadastrar()
    {
        $n = $_POST['name'];
        $e = $_POST['email'];
        $s = $_POST['password'];


        $Usuario = new User($e, $s, $n);

        if ($Usuario->cadastrarUsuario()) {
            header('Location: http://localhost/Projetos%20de%20Programação/lista_de_contatos/app/Views/contacts/listaDeContatos.php');
            exit;
        } else {
            echo 'Erro ao enviar dados';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ContatoController = new ContatoController();

    $ContatoController->cadastrar();
}
