<?php

namespace PROJETO\Views;

require_once __DIR__ . '/../../../vendor/autoload.php';


use PROJETO\Controllers\ContatoController as ListContacts;

// VERIFICANDO SE USUÁRIO ESTÁ LOGADO

$msgsSucesso = [
    "cadastro" => null,
    "login" => null,
    "updateContato" => null,
    "sucDelCont" => null
];
if (isset($_GET['sucessoCadastro'])) {
    $msgsSucesso['cadastro'] = true;
} elseif (isset($_GET['sucessoLogin'])) {
    $msgsSucesso['login'] = true;
} elseif (isset($_GET['alteracaoContato'])) {
    $msgsSucesso['updateContato'] = true;
} elseif (isset($_GET['sucDelCont'])) {
    $msgsSucesso['sucDelCont'] = true;
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
                        <button type="button" class="btn btn-danger">Sair</button>
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


</body>

</html>