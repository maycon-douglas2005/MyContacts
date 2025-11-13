<?php
$baseUrl = '/Projetos de Programação/lista_de_contatos/public/index.php';
$homeDisabled = true;
session_start();

if (!isset($_GET['erroLogin'])) {
    unset($_SESSION['erro_campo_vazio']);
}


require_once '../partials/head.php';
?>

<body class="d-flex flex-column vh-100">
    <?php require_once '../partials/header.php' ?>


    <main class="container-fluid d-flex flex-fill ">
        <div class="row vw-100 d-flex flex-row justify-content-center">
            <form action="http://localhost/Projetos%20de%20Programação/lista_de_contatos/app/Controllers/AuthController.php" method="POST" class="col-4 shadow-lg mb-2 d-flex flex-column justify-content-center align-items-center">
                <h2>Login</h2>
                <?php   ?>
                <div class="campos d-flex flex-column row g-2">
                    <?php if (isset($_SESSION['erro_campo_vazio'])):  ?> <p class="alert alert-danger">Preencha todos os campos!</p> <?php endif; ?>
                    <input type="email" name="email" id="" class="col-auto" placeholder="Email"  maxlength="30">
                    <input type="password" name="password" class="col-auto" id="" placeholder="Senha"  minlength="6" maxlength="12">
                    <button class="btn btn-success btn-outline-black">Enviar</button>
                </div>



            </form>
        </div>

    </main>


    <?php require_once '../partials/footer.php' ?>
</body>

</html>