<?php
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
    <!-- Mensagem de boas-vindas pos-cadastro -->
    <?php if ($msgsSucesso['cadastro'] === true) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p>Cadastro realizado com sucesso!<br>Seja bem-vindo(a)!</p>
        </div>
    <?php } elseif ($msgsSucesso['login'] === true) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p>Login realizado com sucesso!<br>Seja bem-vindo(a)!</p>
        </div>

    <?php } ?>


    <h1>Lista De Contatos</h1>

    <?php require_once '../partials/footer.php' ?>
</body>

</html>