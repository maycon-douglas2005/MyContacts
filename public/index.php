<?php
$paginaIndex = true;
require_once '../app/Views/partials/head.php';
require_once __DIR__ . '/../vendor/autoload.php';

?>


<body class="d-flex flex-column vh-100">
    <?php require_once '../app/Views/partials/header.php' ?>



    <main class="container-fluid  flex-fill ">
        <section class="apresentacao row d-flex flex-column align-items-center" style="height: 100%;">

            <div class="tituloEparagrafo col-7 d-flex flex-column align-items-center">
                <h1>Bem-Vindo A Sua Lista De Contatos</h1>
                <p class="lead">Gerencie seus contatos de maneira <mark>simples</mark> e <mark>eficiente</mark></p>
                <div class="botoes">
                    <a class="btn btn-outline-primary" href="../app/Views/auth/cadastro.php">Cadastrar-se</a>
                    <a class="btn btn-outline-primary" href="../app/Views/auth/login.php">Logar</a>
                </div>

            </div>

            <img id="imgList" style="border: 3px; border-color: gray; border-style: solid;" src="../public/images/home.png" class="img-fluid col-8 shadow-lg mt-4" alt="">
        </section>




        </div>

    </main>



    <?php require_once '../app/Views/partials/footer.php' ?>

    <script>
        const img = document.getElementById("imgList");

img.onerror = function () {
    this.src = "/MyContacts/public/images/home.png";
};
    </script>
</body>

</html>