<?php

namespace PROJETO\Views;

require_once __DIR__ . '/../../../vendor/autoload.php';


use PROJETO\Controllers\ContatoController as ListContacts;

// VERIFICANDO SE USUÁRIO ESTÁ LOGADO

$msgsSucesso = [
    "cadastro" => null,
    "login" => null
];
if (isset($_GET['sucessoCadastro'])) {
    $msgsSucesso['cadastro'] = true;
} elseif (isset($_GET['sucessoLogin'])) {
    $msgsSucesso['login'] = true;
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
        $msgsSucesso['cadastro'] = false; //reset
    } elseif ($msgsSucesso['login'] === true) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p>Login realizado com sucesso!<br>Seja bem-vindo(a)!</p>
        </div>

    <?php
        $msgsSucesso['login'] = false; //reset
    } ?>




    <!-- Corpo da página -->
    <main class="container ">
        <section class="shadow-md row d-flex flex-column">
            <div class="d-flex flex-row col-auto justify-content-around">
                <h1 class="m-0 col-auto">Lista De Contatos</h1>
                <div id="btnsTable" class="btns d-flex flex-row">
                    <button class="mx-1 btn btn-primary col-auto" id="addContact">Adicionar</button>
                    <button class="mx-1 btn btn-secondary col-auto" id="editContact">Editar</button>
                    <button class="mx-1 btn btn-danger col-auto" id="deleteContact">Excluir</button>
                </div>

            </div>

            <table class="col-12 shadow-lg mt-2">
                <thead>
                    <tr class="justify-content-around d-flex">
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Celular</th>

                    </tr>
                </thead>
                <tbody>
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
</body>

</html>