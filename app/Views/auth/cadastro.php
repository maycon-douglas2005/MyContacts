<?php
$baseUrl = '/Projetos de Programação/lista_de_contatos/public/index.php';
require_once '../partials/head.php';
?>

<body class="d-flex flex-column vh-100">
    <?php require_once '../partials/header.php' ?>


    <main class="container-fluid d-flex flex-fill ">
        <div class="row vw-100 d-flex flex-row justify-content-center">
            <form action="http://localhost/Projetos%20de%20Programação/lista_de_contatos/app/Controllers/UsuarioController.php" method="POST" class="col-4 shadow-lg mb-2 d-flex flex-column justify-content-center align-items-center">
                <h2>Registro</h2>
                <div class="campos d-flex flex-column row g-2">
                    <input type="text" name="name" id="" class="col-auto" placeholder="Primeiro Nome" required maxlength="10">
                    <input type="email" name="email" id="" class="col-auto" placeholder="Email" required maxlength="30">
                    <input type="password" name="password" class="col-auto" id="" placeholder="Senha" required minlength="6" maxlength="12">
                    <button class="btn btn-success btn-outline-black">Enviar</button>
                </div>



            </form>
        </div>

    </main>


    <?php require_once '../partials/footer.php' ?>
</body>

</html>