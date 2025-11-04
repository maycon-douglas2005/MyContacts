<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PROJETO\Models\Usuario as User;

class UsuarioController
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
        } elseif ($Usuario->cadastrarUsuario() === 1) {
            //header('Location: http://localhost/Projetos%20de%20Programação/lista_de_contatos/app/Views/auth/cadastro.php');
            echo "Erro formato email";
        } else if ($Usuario->cadastrarUsuario() === 2) {
            //header('Location: http://localhost/Projetos%20de%20Programação/lista_de_contatos/app/Views/auth/cadastro.php');
            echo 'Erro dominio email';
        } else {
            echo 'Erro ao enviar dados';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ContatoController = new UsuarioController();

    $ContatoController->cadastrar();
}
