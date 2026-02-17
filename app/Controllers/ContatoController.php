<?php

namespace PROJETO\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use PROJETO\Models\Contatos;
use PROJETO\Helpers\VerificationFieldsHelper as FieldsHelper;
use PROJETO\Helpers\EmailHelper as Email;

class ContatoController
{


    public static function store()
    {
        $n = $_POST['nome'];
        $e = $_POST['email'];
        $c = $_POST['celular'];

        // VERIFICANDO SE OS CAMPOS ESTÂO PREENCHIDOS
        if (FieldsHelper::vericandoCamposPreenchidos($n, $e, $c)) {

            if (Email::verificacaoEmailCadastrado($e) === false) {
                if (Email::validarEmail($e)) {
                    $Contato = new Contatos($n, $e, $c);
                    if ($Contato->save()) {
                        header('Location: ../Views/contacts/listaDeContatos.php?contatoAdicionado=true?sucessoLogin=true');
                    } else {
                        header('Location: ../Views/contacts/listaDeContatos.php?contatoAdicionado=false?sucessoLogin=true');
                    }
                } elseif (Email::validarEmail($e) === 2) {
                    header('Location: ../Views/contacts/listaDeContatos.php?formatoEmailIncorreto=true?sucessoLogin=true');
                } elseif (Email::validarEmail($e) === 3) {
                    header('Location: ../Views/contacts/listaDeContatos.php?dominioEmailIncorreto=true?sucessoLogin=true');
                }
            } else {
                header('Location: ../Views/contacts/listaDeContatos.php?emailContatoCadastrado=true?sucessoLogin=true');
            }
        } else {

            header('Location: ../Views/contacts/listaDeContatos.php?campoVazioAddContact=true?sucessoLogin=true');
        }
    }

    public static function index()
    {
        $ListaContatos = Contatos::getAll();
        foreach ($ListaContatos as $linhaListaContatos) { ?>
            <tr class="justify-content-around d-flex">
                <td><?php echo $linhaListaContatos['nome'] ?></td>
                <td><?php echo $linhaListaContatos['email'] ?></td>
                <td><?php echo $linhaListaContatos['celular'] ?></td>
                <td>Nenhum ação</td>
            </tr>
<?php
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    ContatoController::store();
}
