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
            
            $resultadoCadastrarUsuario = $Usuario->cadastrarUsuario();
            if ($resultadoCadastrarUsuario === true) {

                header('Location: http://localhost/MyContacts/app/Views/contacts/listaDeContatos.php?sucessoCadastro=true');
                exit;
            } elseif ($resultadoCadastrarUsuario === 2) { 
                header('Location: http://localhost/MyContacts/app/Views/auth/cadastro.php?erroFormatoEmail=true');
                exit;
            } elseif ($resultadoCadastrarUsuario === 3) {
                header('Location: http://localhost/MyContacts/app/Views/auth/cadastro.php?erroDominioEmail=true');
                exit;
            } elseif ($resultadoCadastrarUsuario === 4) { 
                header('Location: http://localhost/MyContacts/app/Views/auth/cadastro.php?erroEmailCadastrado=true');
                exit;
            } elseif($resultadoCadastrarUsuario === 5) {
                header("Location: http://localhost/MyContacts/app/Views/error/erroInesperado.php");
                exit;
            }
        } 

            header('Location: http://localhost/MyContacts/app/Views/auth/cadastro.php?erroCamposVaziosCadastro=true');
            exit;
        
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    UsuarioController::cadastrar();
}
