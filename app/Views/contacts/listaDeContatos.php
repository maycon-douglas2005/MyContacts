<?php

namespace PROJETO\Views;

require_once __DIR__ . '/../../../vendor/autoload.php';


use PROJETO\Controllers\ContatoController as ListContacts;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// VERIFICANDO SE USUÁRIO ESTÁ LOGADO

$msgsSucesso = [
    "cadastro" => null,
    "login" => null,
    "updateContato" => null,
    "sucDelCont" => null,
    "campoVazioAddContact" => null,
    "emailContatoCadastrado" => null,
    "contatoAdicionado" => null,
    "contatosDeletados" => null,
    "contatosNaoDeletados" => null,
    "formatoEmailIncorreto" => null,
    "dominioEmailIncorreto" => null,
    "celularCaracteresErro" => null,
    "celularQuantidadeErro" => null,
    "celularDDDerro" => null,
    "alteracaoErro" => null

];
if (isset($_GET['alteracaoErro'])) {
    $msgsSucesso['alteracaoErro'] = true;
} 
if (isset($_GET['celularDDDerro'])) {
    $msgsSucesso['celularDDDerro'] = true;
} 
if (isset($_GET['celularQuantidadeErro'])) {
    $msgsSucesso['celularQuantidadeErro'] = true;
} 
if (isset($_GET['celularCaracteresErro'])) {
    $msgsSucesso['celularCaracteresErro'] = true;
} 
if (isset($_GET['sucessoCadastro'])) {
    $msgsSucesso['cadastro'] = true;
} 
if (isset($_GET['sucessoLogin'])) {
    $msgsSucesso['login'] = true;
} 
if (isset($_GET['alteracaoContato'])) {
    $msgsSucesso['updateContato'] = true;
} 
if (isset($_GET['sucDelCont'])) {
    $msgsSucesso['sucDelCont'] = true;
}
if (isset($_GET['campoVazioAddContact'])) {
    $msgsSucesso['campoVazioAddContact'] = true;
}
if (isset($_GET['emailContatoCadastrado'])) {
    $msgsSucesso['emailContatoCadastrado'] = true;
}
if (isset($_GET['contatoAdicionado'])) {
    $msgsSucesso['contatoAdicionado'] = true;
}
if (isset($_GET['contatosDeletados'])) {
    $msgsSucesso['contatosDeletados'] = true;
}
if (isset($_GET['contatosNaoDeletados'])) {
    $msgsSucesso['contatosNaoDeletados'] = true;
}

if (isset($_GET['formatoEmailIncorreto'])) {
    $msgsSucesso['formatoEmailIncorreto'] = true;
}
if (isset($_GET['dominioEmailIncorreto'])) {
    $msgsSucesso['dominioEmailIncorreto'] = true;
}

if (!isset($_SESSION['usuario']['id'])) {
    header('Location: ../auth/login.php');
}
require_once '../partials/head.php';
?>



<body>

    <!-- Inclusão do header  -->
    <?php include('../partials/header.php') ?>


    <!-- Mensagem de boas-vindas pos-cadastro -->



    <?php if ($msgsSucesso['cadastro'] === true) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p>Cadastro realizado com sucesso!<br>Seja bem-vindo(a)!</p>
        </div>
    <?php
        $msgsSucesso['cadastro'] = null; //reset
    } elseif ($msgsSucesso['login'] === true) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p>Login realizado com sucesso!<br>Seja bem-vindo(a)!</p>
        </div>

    <?php
        $msgsSucesso['login'] = null; //reset


        // status de update de contato(s)
    } elseif ($msgsSucesso['updateContato'] === true) { ?>
        <div class="alert alert-success alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Alterações realizadas com sucesso!</p>

        </div>
    <?php } ?>

    <?php
    if ($msgsSucesso['sucDelCont'] === true) { ?>
        <div class="alert alert-success alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Contato(s) excluidos com sucesso!</p>
        </div>
    <?php }
    $msgsSucesso['sucDelCont'] = null;
    ?>

    <?php
    if ($msgsSucesso['campoVazioAddContact'] === true) { ?>
        <div class="alert alert-danger alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Contato não adicionado. Por favor, preencha todos os campos do contato!</p>
        </div>
    <?php }
    $msgsSucesso['campoVazioAddContact'] = null;
    ?>

    <?php
    if ($msgsSucesso['emailContatoCadastrado'] === true) { ?>
        <div class="alert alert-danger alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Contato não adicionado. O email digitado pertence a um contato já cadastrado!</p>
        </div>
    <?php }
    $msgsSucesso['emailContatoCadastrado'] = null;
    ?>

    <?php
    if ($msgsSucesso['contatoAdicionado'] === true) { ?>
        <div class="alert alert-success alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Contato adicionado com sucesso!</p>
        </div>
    <?php }
    $msgsSucesso['contatoAdicionado'] = null;
    ?>

    <?php
    if ($msgsSucesso['contatosDeletados'] === true) { ?>
        <div class="alert alert-success alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Contato(s) deletado(s) com sucesso!</p>
        </div>
    <?php }
    $msgsSucesso['contatosDeletados'] = null;
    ?>


    <?php
    if ($msgsSucesso['contatosNaoDeletados'] === true) { ?>
        <div class="alert alert-danger alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Erro ao deletar contato(s)!</p>
        </div>
    <?php }
    $msgsSucesso['contatosNaoDeletados'] = null;
    ?>

    <?php
    if ($msgsSucesso['formatoEmailIncorreto'] === true) { ?>
        <div class="alert alert-danger alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Formato de email incorreto!</p>
        </div>
    <?php }
    $msgsSucesso['formatoEmailIncorreto'] = null;
    ?>

    <?php
    if ($msgsSucesso['dominioEmailIncorreto'] === true) { ?>
        <div class="alert alert-danger alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Domínio de email inválido!</p>
        </div>
    <?php }
    $msgsSucesso['dominioEmailIncorreto'] = null;
    ?>

    <?php
    if ($msgsSucesso['celularCaracteresErro'] === true) { ?>
        <div class="alert alert-danger alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Celular inválido. Por favor, digite apenas números!</p>
        </div>
    <?php }
    $msgsSucesso['celularCaracteresErro'] = null;
    ?>

    <?php
    if ($msgsSucesso['celularQuantidadeErro'] === true) { ?>
        <div class="alert alert-danger alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Celular inválido. Digite apenas 11 números: DDD + número do celular. Exemplo: 11987654321</p>
        </div>
    <?php }
    $msgsSucesso['celularQuantidadeErro'] = null;
    ?>

    <?php
    if ($msgsSucesso['celularDDDerro'] === true) { ?>
        <div class="alert alert-danger alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Celular inválido. Por favor, digite um DDD válido.</p>
        </div>
    <?php }
    $msgsSucesso['celularDDDerro'] = null;
    ?>

    <?php
    if ($msgsSucesso['alteracaoErro'] === true) { ?>
        <div class="alert alert-danger alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p class="p-0 m-0">Erro ao atualizar contato. Verifique se todos os campos estão preenchidos corretamente.</p>
        </div>
    <?php }
    $msgsSucesso['alteracaoErro'] = null;
    ?>





    <!-- Corpo da página -->
    <main class="container ">

        <!-- MODAL AVISO LOGOUT -->

        <div class="modal fade" id="modalWarningLogout" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Ao confirmar você irá encerrar sua sessão e terá que fazer
                            login novamente para acessar seus contatos.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btnLogout">Sair</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- FIM MODAL AVISO LOGOUT -->



        <section class="row d-flex flex-column  p-5 ">
            <div class="d-flex flex-row col-auto justify-content-around">
                <h1 id="TituloListaDeContatos" class="m-0 col-auto ">Lista De Contatos</h1>
                <div id="btnsTable" class="btns d-flex flex-row">
                    <button class="mx-1 btn btn-primary col-auto align-self-center" id="addContact">Adicionar</button>
                    <button class="mx-1 btn btn-secondary col-auto align-self-center" id="editContact">Editar</button>
                    <button class="mx-1 btn btn-danger col-auto align-self-center" id="deleteContact">Excluir</button>
                </div>

            </div>

            <table class="col-12 shadow-lg mt-2 ">
                <thead>
                    <tr class="justify-content-around d-flex">
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Celular</th>

                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php echo ListContacts::index() ?>
                </tbody>
            </table>
        </section>
    </main>


    <?php require_once '../partials/footer.php';
    if (!isset($_SESSION['usuario']['id'])) {
        header('Location: ../auth/cadastro.php');
    }
    ?>

    <script src="../../../public/js/formAddContact.js"></script>
    <script src="../../../public/js/btnEditContact.js"></script>
    <script src="../../../public/js/btnSalvarAlteracoes.js"></script>
    <script src="../../../public/js/btnDelContact.js"></script>
    <script src="../../../public/js/btnLogout.js"></script>

</body>

</html>