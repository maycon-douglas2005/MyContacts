<?php
$mostrarMsgSucesso = null;
if (isset($_GET['sucesso'])) {
    $mostrarMsgSucesso = true;
}
require_once '../partials/head.php';
?>



<body>

    <?php if ($mostrarMsgSucesso === true): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p>Cadastro realizado com sucesso!<br>Seja bem-vindo(a)!</p>
        </div>
    <?php endif ?>

    <h1>Lista De Contatos</h1>

    <?php require_once '../partials/footer.php' ?>
</body>

</html>