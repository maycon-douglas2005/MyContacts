<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PROJETO\Models\Usuario as User;

session_start();

class UsuarioController
{
    public static function cadastrar()
    {
        $n = $_POST['name'];
        $e = $_POST['email'];
        $s = $_POST['password'];

        $resultVerificacaoCamposPreenchidos = User::verificacaoCamposPreenchidos($e, $s, $n);
        if ($resultVerificacaoCamposPreenchidos) {

            $Usuario = new User($e, $s, $n);
            // $_SESSION['Usuario'] = $Usuario;
            $resultadoCadastrarUsuario = $Usuario->cadastrarUsuario();
            if ($resultadoCadastrarUsuario === true) {

                header('Location: http://localhost/Projetos%20de%20Programação/lista_de_contatos/app/Views/contacts/listaDeContatos.php?sucessoCadastro=true');
                exit;
            } elseif ($resultadoCadastrarUsuario === 2) {
                echo "Erro no formato do email ";
            } elseif ($resultadoCadastrarUsuario === 3) {
                echo "Erro no dominio do email";
            } elseif ($resultadoCadastrarUsuario === 4) {
                echo "Email já cadastrado";
            } else {

                echo 'Erro: ' . $resultadoCadastrarUsuario;
            }
        } else {

            header('Location: http://localhost/Projetos%20de%20Programação/lista_de_contatos/app/Views/auth/cadastro.php?erroCadastro=true');
            exit;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    UsuarioController::cadastrar();
}
