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
        if (Contatos::updateMultiple($d)) {
            echo json_encode([
                "status" => "success"
            ]);
        } else {
            echo json_encode([
                "status" => "error"
            ]);
        }
        exit;
    }

    public static function formatarCelularBR($numero)
    {
        // remove tudo que não for número
        $numero = preg_replace('/\D/', '', $numero);

        // valida celular brasileiro
        if (!preg_match('/^\d{2}9\d{8}$/', $numero)) {
            return false;
        }

        // separa partes
        $ddd = substr($numero, 0, 2);
        $parte1 = substr($numero, 2, 5);
        $parte2 = substr($numero, 7, 4);

        // retorna formatado
        return "($ddd) $parte1-$parte2";
    }

    public static function store()
    {
        $n = $_POST['nome'];
        $e = $_POST['email'];
        $c = ContatoController::formatarCelularBR($_POST['celular']);

        
        
        
        // VERIFICANDO SE OS CAMPOS ESTÂO PREENCHIDOS
        if (User::verificacaoCamposPreenchidos($n, $e, $c)) {

            if (Email::verificacaoEmailCadastrado($e) === false) {
                if (Email::validarEmail($e)) {
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
