<?php
$baseUrl = '/Projetos de Programação/lista_de_contatos/public/index.php';
$homeDisabled = true;
require_once '../partials/head.php';
session_start();
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

        <form action="../../Controllers/AuthController.php" method="POST" class="text-center rounded-3 p-4 w-50 bg-white col-auto shadow-lg  d-flex flex-column justify-content-center gap-5">
            <header>
                <h2 class="">Login</h2>
                <p class="text-muted m-0">Por favor, preencha os campos abaixo:</p>
            </header>


            <?php   ?>
            <div class="d-flex flex-column gap-2">

                <?php
                if (isset($_GET['erroCamposVaziosLogin'])):  ?> <p class="alert alert-danger">Preencha todos os campos!</p>
                <?php endif;
                if (isset($_GET['erroEmail'])): ?> <p class="alert alert-danger">E-mail ou senha inválido!</p>
                <?php endif; ?>
                <div class="inputs  d-flex flex-column gap-4">

                    <input type="email" name="email" id="" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Formato Aceito: nome@domínio.com" placeholder="Email" maxlength="100">
                    <input type="password" name="password" class="form-control" id="" placeholder="Senha" maxlength="100">
                </div>
            </div>


            <button class="btn btn-primary w-75 rounded align-self-center ">Entrar</button>

        </form>

    </main>

    <script src="../../../public/js/btnLogout.js"></script>

    <?php require_once '../partials/footer.php' ?>
</body>

</html>