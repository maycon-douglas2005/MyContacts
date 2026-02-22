<?php

namespace PROJETO\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use PROJETO\Models\Contatos;
use PROJETO\Helpers\VerificationFieldsHelper as FieldsHelper;
use PROJETO\Helpers\EmailHelper as Email;




class ContatoController
{
    public static function update($d){
        
        if(Contatos::updateMultiple($d)){
            header('Location: ../Views/listaDeContatos.php?alteracaoContato=true');
            exit;
        } else {
            header('Location: ../Views/listaDeContatos.php?alteracaoContato=false');
            exit;
        }
    }

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
                        header('Location: ../Views/contacts/listaDeContatos.php?contatoAdicionado=true?');
                        exit;
                    } else {
                        header('Location: ../Views/contacts/listaDeContatos.php?contatoAdicionado=false?');
                        exit;
                    }
                } elseif (Email::validarEmail($e) === 2) {
                    header('Location: ../Views/contacts/listaDeContatos.php?formatoEmailIncorreto=true?');
                    exit;
                } elseif (Email::validarEmail($e) === 3) {
                    header('Location: ../Views/contacts/listaDeContatos.php?dominioEmailIncorreto=true?');
                    exit;
                }
            } else {
                header('Location: ../Views/contacts/listaDeContatos.php?emailContatoCadastrado=true?');
                exit;
            }
        } else {

            header('Location: ../Views/contacts/listaDeContatos.php?campoVazioAddContact=true?');
            exit;
        }
    }

    public static function index()
    {
        $ListaContatos = Contatos::getAll();
        foreach ($ListaContatos as $linhaListaContatos) { ?>
            <tr class="justify-content-around d-flex">
                <td class="d-flex justify-content-center"><input data-original="<?php echo $linhaListaContatos['nome'] ?>" data-id="<?php echo $linhaListaContatos['id']?>" type="text" readonly class="form-control-plaintext campo_nome" value="<?php echo $linhaListaContatos['nome'] ?>"></td>
                <td class="d-flex justify-content-center"><input type="text" readonly class="form-control-plaintext" value="<?php echo $linhaListaContatos['email'] ?>"></td>
                <td class="d-flex justify-content-center"><input type="text" readonly class="form-control-plaintext" value="<?php echo $linhaListaContatos['celular'] ?>"></td>

            </tr>
<?php
        }
    }
}


$data = json_decode(file_get_contents("php://input"),true);

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($data['action']) && $data['action'] === "update"){
    ContatoController::update($data);
}
elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
    ContatoController::store();
}