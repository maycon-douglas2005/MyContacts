<?php
    $msgsSucesso = [
        "cadastro" => null,
        "login" => null
    ];
    if (isset($_GET['sucessoCadastro'])) {
        $msgsSucesso['cadastro'] = true;
    } elseif (isset($_GET['sucessoLogin'])) {
        $msgsSucesso['login'] = true;
    } else {
        header('Location: ../auth/cadastro.php?userDeslogado=true');
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
    <?php } elseif ($msgsSucesso['login'] === true) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button class="btn-close" data-bs-dismiss="alert"></button>
        <p>Login realizado com sucesso!<br>Seja bem-vindo(a)!</p>
    </div>

    <?php } ?>




    <!-- Corpo da página -->
    <main class="container ">
        <section class="shadow-md row d-flex flex-column">
            <div class="d-flex flex-row col-auto justify-content-around">
                <h1 class="m-0 col-auto">Lista De Contatos</h1>
                <button class="btn btn-primary col-auto" id="addContact">Adicionar Contato</button>
            </div>

            <table class="col-12 shadow-lg mt-2">
                <thead>
                    <tr class="justify-content-around d-flex">
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr></tr>
                </tbody>
            </table>
        </section>
    </main>


    <?php require_once '../partials/footer.php' ?>
    <script src="../../../public/js/formAddContact.js"></script>
</body>

</html>