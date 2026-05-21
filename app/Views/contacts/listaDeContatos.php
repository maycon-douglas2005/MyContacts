<?php

namespace PROJETO\Views;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PROJETO\Controllers\ContatoController as ListContacts;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario']['id'])) {
    header('Location: ../auth/login.php');
    exit;
}

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
    "celularErro" => null,
    "alteracaoErro" => null

];
if (isset($_GET['alteracaoErro'])) {
    $msgsSucesso['alteracaoErro'] = true;
}
if (isset($_GET['celularErro'])) {
    $msgsSucesso['celularErro'] = true;
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


require_once '../partials/head.php';
?>

<body class="bg-light">

    <?php include('../partials/header.php'); ?>

    <!-- TOAST / ALERT AREA -->
    <div class="position-fixed top-0 start-50 translate-middle-x mt-3 z-3" style="width: 100%;"><?php if ($msgsSucesso['cadastro'] === true) { ?>
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
        if ($msgsSucesso['celularErro'] === true) { ?>
            <div class="alert alert-danger alert-dismissible fade show w-25 position-absolute" style="left:37%;top: 5%;" role="alert">
                <button class="btn-close" data-bs-dismiss="alert"></button>
                <p class="p-0 m-0">Celular inválido. Use o formato (DD) 9XXXX-XXXX.</p>
            </div>
        <?php }
        $msgsSucesso['celularErro'] = null;
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

    </div>

    <main class="container py-4 mt-3 shadow" style="background-color: #A0D0E4; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">

        <!-- HEADER DA PÁGINA -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="mb-0 fw-bold">Lista de Contatos</h2>
                <small class="text-muted">Gerencie seus contatos</small>
            </div>

            <div id="btnsTable" class="d-flex gap-2">

                <button id="addContact" class="btn btn-primary shadow ">

                    <i class="bi bi-person-plus fs-5"></i>
                </button>

                <button id="editContact" class="btn btn-secondary shadow">

                    <i class="bi bi-pencil-square fs-5"></i>
                </button>

                <button id="deleteContact" class="btn btn-danger shadow">
                    <i class="bi bi-trash3 fs-5"></i>
                </button>

            </div>

        </div>


        <div class="card shadow-sm border-0">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table- table-borderless align-middle mb-0">

                        <thead class="table-light d-flex " style="background-color: #f8f9fa;">
                            <tr class="d-flex  justify-content-between  w-100">
                                <th style="margin-left: 80px;">Nome</th>
                                <th>Email</th>
                                <th style="margin-right: 80px;" id="cabecalhoCelular">Celular</th>
                            </tr>
                        </thead>

                        <tbody id="tableBody" class="">

                            <?php echo ListContacts::index(); ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </main>

    <!-- MODAL LOGOUT -->
    <div class="modal fade" id="modalWarningLogout" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p>Deseja encerrar sua sessão?</p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" id="btnLogout">Sair</button>
                </div>

            </div>
        </div>
    </div>

    <?php require_once '../partials/footer.php'; ?>

    <!-- SCRIPTS (MANTIDOS) -->
    <script src="../../../public/js/formAddContact.js"></script>
    <script src="../../../public/js/btnEditContact.js"></script>
    <script src="../../../public/js/btnSalvarAlteracoes.js"></script>
    <script src="../../../public/js/btnDelContact.js"></script>
    <script src="../../../public/js/btnLogout.js"></script>

</body>

</html>