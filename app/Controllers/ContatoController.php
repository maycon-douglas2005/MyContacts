<?php

namespace PROJETO\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use PROJETO\Models\Contatos;
use PROJETO\Helpers\EmailHelper as Email;
use PROJETO\Models\Usuario as User;



class ContatoController
{
    public static function update($d)
    {

        header('Content-Type: application/json');
        $updateResult = Contatos::updateMultiple($d);
        if ($updateResult === true) {
            echo json_encode([
                "status" => "success"
            ]);
        } elseif ($updateResult === 2) {
            echo json_encode([
                "status" => "formatoEmailIncorreto"
            ]);
        } elseif ($updateResult === 3) {
            echo json_encode([
                "status" => "dominioEmailIncorreto"
            ]);
        } elseif ($updateResult === 4) {
            echo json_encode([
                "status" => "erroCelular"
            ]);
        } else {
            echo json_encode([
                "status" => "erro"
            ]);
        }
        exit;
    }



    public static function store()
    {
        $n = $_POST['nome'];
        $e = $_POST['email'];
        $c = Contatos::formatarCelularBR($_POST['celular']);




        // VERIFICANDO SE OS CAMPOS ESTÂO PREENCHIDOS
        if (User::verificacaoCamposPreenchidos($n, $e, $c)) {

            if (Email::verificacaoEmailCadastrado($e) === false) {
                if ($c !== false) {

                    if (Email::validarEmail($e) === true) {
                        $Contato = new Contatos($n, $e, $c);
                        if ($Contato->save()) {
                            header('Location: ../Views/contacts/listaDeContatos.php?contatoAdicionado=true');
                            exit;
                        } else {
                            header('Location: ../Views/contacts/listaDeContatos.php?contatoAdicionado=false');
                            exit;
                        }
                    } elseif (Email::validarEmail($e) === 2) {
                        header('Location: ../Views/contacts/listaDeContatos.php?formatoEmailIncorreto=true');
                        exit;
                    } elseif (Email::validarEmail($e) === 3) {
                        header('Location: ../Views/contacts/listaDeContatos.php?dominioEmailIncorreto=true');
                        exit;
                    }
                } else {
                    header('Location: ../Views/contacts/listaDeContatos.php?celularErro=true');
                    exit;
                }
            } else {
                header('Location: ../Views/contacts/listaDeContatos.php?emailContatoCadastrado=true');
                exit;
            }
        } else {

            header('Location: ../Views/contacts/listaDeContatos.php?campoVazioAddContact=true');
            exit;
        }
    }

    public static function index()
    {
        $ListaContatos = Contatos::getAll();
        foreach ($ListaContatos as $linhaListaContatos) { ?>
            <tr class="justify-content-around d-flex">
                <td class="d-flex justify-content-center"><input data-original="<?php echo $linhaListaContatos['nome'] ?>" data-id="<?php echo $linhaListaContatos['id'] ?>" type="text" readonly class="form-control-plaintext campo_nome" value="<?php echo $linhaListaContatos['nome'] ?>"></td>
                <td class="d-flex justify-content-center"><input data-original="<?php echo $linhaListaContatos['email'] ?>" data-id="<?php echo $linhaListaContatos['id'] ?>" type="text" readonly class="form-control-plaintext campo_email" value="<?php echo $linhaListaContatos['email'] ?>"></td>
                <td class="d-flex justify-content-center"><input data-original="<?php echo $linhaListaContatos['celular'] ?>" data-id="<?php echo $linhaListaContatos['id'] ?>" type="text" readonly class="form-control-plaintext campo_celular" value="<?php echo $linhaListaContatos['celular'] ?>"></td>

            </tr>
<?php
        }
    }

    public static function delete($dados)
    {
        if (Contatos::deleteMultiple($dados)) {
            header('Location: ../Views/contacts/listaDeContatos.php?contatosDeletados=true');
            exit;
        } else {
            header('Location: ../Views/contacts/listaDeContatos.php?contatosNaoDeletados=true');
            exit;
        }
    }
}

// ALTERAÇÃO DE CONTATOS
$data = json_decode(file_get_contents("php://input"), true);


if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($data['action']) && $data['action'] === "update") {
    ContatoController::update($data);
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST["contatosSelecionados"])) {
    $contatos = json_decode($_POST["contatosSelecionados"], true);
    ContatoController::delete($contatos);
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['nome'])) {
    ContatoController::store();
}
