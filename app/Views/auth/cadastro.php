<?php

session_start();
$baseUrl = '/lista_de_contatos/public/index.php';
$homeDisabled = true;
require_once '../partials/head.php';

?>

<body class="d-flex flex-column vh-100">
    <?php require_once '../partials/header.php' ?>


    <main style="background-color: #A0D0E4; border-bottom-left-radius: 10px; border-bottom-right-radius:10px" class="d-flex flex-row justify-content-center py-3 shadow mt-5 mb-3 container  flex-fill ">
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

        <form action="../../Controllers/UsuarioController.php" method="POST" class="text-center rounded-3 p-4 w-50 bg-white col-auto shadow-lg  d-flex flex-column justify-content-between ">
            <div class="alert alert-warning <?= isset($_GET['userDeslogado']) ? "d-flex" : "d-none" ?>">Você precisa estar logado antes de acessar a sua lista de contatos!</div>
            <header>
                <h2 class="">Criando Sua Conta</h2>
                <p class="text-muted m-0">Por favor, preencha os campos abaixo:</p>
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
                    <div class="position-relative">

                        <input
                            type="password"
                            class="form-control"
                            id="password"
                            name="password"
                            placeholder="Digite sua senha">

                        <button
                            type="button"
                            id="togglePassword"
                            class="btn position-absolute top-50 end-0 translate-middle-y border-0 bg-transparent">
                            <i class="bi bi-eye-slash" id="passwordIcon"></i>
                        </button>

                    </div>
                </div>

            </div>


            <button class="btn btn-primary w-75 rounded align-self-center ">Criar Conta</button>

        </form>


    </main>

    <script src="../../../public/js/btnLogout.js"></script>
    <script src="/public/js/togglePassword.js"></script>
    <?php require_once '../partials/footer.php' ?>
</body>

</html>