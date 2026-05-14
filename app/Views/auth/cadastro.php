<?php

session_start();
$baseUrl = '/lista_de_contatos/public/index.php';
$homeDisabled = true;
require_once '../partials/head.php';

?>

<body class="d-flex flex-column vh-100">
    <?php require_once '../partials/header.php' ?>


    <main style="background-color: #A0D0E4; border-bottom-left-radius: 10px; border-bottom-right-radius:10px" class="d-flex flex-row justify-content-center py-3 shadow mt-5 mb-3 container  flex-fill ">
        <form action="../../Controllers/UsuarioController.php" method="POST" class="text-center rounded-3 p-4 w-50 bg-white col-auto shadow-lg  d-flex flex-column justify-content-between ">
            <div class="alert alert-warning <?= isset($_GET['userDeslogado']) ? "d-flex" : "d-none" ?>">Você precisa estar logado antes de acessar a sua lista de contatos!</div>
            <header>
                <h2 class="">Criando Sua Conta</h2>
                <p class="text-muted">Por favor, preencha os campos abaixo:</p>
            </header>
            <div class="d-flex flex-column gap-2">

                <?php
                if (isset($_GET['erroCamposVaziosCadastro'])):  ?>
                    <p class="alert alert-danger p-2 ">Preencha todos os campos!</p>
                <?php endif; ?>

                <?php
                if (isset($_GET['erroFormatoEmail'])): ?>
                    <p class="alert alert-danger">Formato de email inválido!</p>
                <?php endif; ?>

                <?php
                if (isset($_GET['erroDominioEmail'])): ?>
                    <p class="alert alert-danger">Domínio de email inválido!</p>
                <?php endif; ?>

                <?php
                if (isset($_GET['erroEmailCadastrado'])): ?>
                    <p class="alert alert-danger">Este email já está cadastrado. Por favor, escolha outro email.</p>
                <?php endif; ?>
                <div class="inputs d-flex flex-column gap-4">

                    <input type="text" name="name" class=" form-control" placeholder="Nome" maxlength="100">
                    <input type="email" name="email" class=" form-control" placeholder="Email" maxlength="100" data-toggle="tooltip" data-placement="bottom" title="Formato Aceito: nome@domínio.com">
                    <input type="password" name="password" class=" form-control" placeholder="Senha" maxlength="100">
                </div>

            </div>


            <button class="btn btn-primary w-75 rounded align-self-center ">Criar Conta</button>

        </form>


    </main>


    <?php require_once '../partials/footer.php' ?>
</body>

</html>