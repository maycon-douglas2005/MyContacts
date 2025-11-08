<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PROJETO\Models\Usuario as User;

// session_start();

class UsuarioController
{
    public function cadastrar()
    {
        $n = $_POST['name'];
        $e = $_POST['email'];
        $s = $_POST['password'];

        $resultVerificacaoCamposPreenchidos = User::verificacaoCamposPreenchidos($e, $s, $n);
        if ($resultVerificacaoCamposPreenchidos) {

            $Usuario = new User($e, $s, $n);
            // $_SESSION['Usuario'] = $Usuario;
            $resultadoCadastrarUsuario = $Usuario->cadastrarUsuario();
            if ($resultadoCadastrarUsuario) {
                echo  $resultadoCadastrarUsuario;
                header('Location: http://localhost/Projetos%20de%20Programação/lista_de_contatos/app/Views/contacts/listaDeContatos.php');
                exit;
            } elseif ($resultadoCadastrarUsuario === false) {
                echo "Erro no formato ou dominio do email";
            } else {

                echo 'Erro: ' . $resultadoCadastrarUsuario;
            }
        } else {
            echo "Valores nao preenchidos";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ContatoController = new UsuarioController();

    $ContatoController->cadastrar();
}
