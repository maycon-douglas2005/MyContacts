<?php
$paginaIndex = true;
require_once '../app/Views/partials/head.php';
require_once __DIR__ . '/../vendor/autoload.php';

?>


<body class="d-flex flex-column vh-100" style="background-color: #EBEBEB;">
    <?php require_once '../app/Views/partials/header.php' ?>



    <main style="background-color: #A0D0E4; border-bottom-left-radius: 10px; border-bottom-right-radius:10px" class="shadow mt-5 mb-3 container  flex-fill ">
        <section class="apresentacao row d-flex flex-column align-items-center justify-content-center" style="height: 100%;">
            <h1 class="col-auto mt-4">Bem-Vindo A Sua Lista De Contatos</h1>
            <div class="tituloEparagrafo  col-10 d-flex flex-row align-items-center justify-content-between">

                <div class="textoEbtn d-flex flex-column mb-5">
                    <p class="lead">Gerencie seus contatos de maneira simples e eficiente com <mark>MyContacts</mark>.</p>
                    <a style="height: 72px; width: 320px;" class="shadow btn btn-outline-primary align-self-center" href="../app/Views/auth/cadastro.php">
                        <p class="mt-3 fs-5">Gerenciar meus contatos</p>
                    </a>
                </div>

                <div class="card p-2  col-7 mb-3 mt-2 d-flex flex-column justify-content-center align-items-center">
                    <video autoplay muted loop style="height: 200px;" class="rounded shadow-lg card-img-top img-fluid  mt-3">
                        <source src="public/images/video_home.mp4" type="video/mp4">
                    </video>

                    <div class="card-body align-self-center">
                        <p class="card-text text-muted small fst-italic">
                            Veja o sistema em ação
                        </p>
                    </div>
                </div>
            </div>

        </section>




        </div>

    </main>



    <?php require_once '../app/Views/partials/footer.php' ?>

    <script>
        const img = document.getElementById("imgList");

        img.onerror = function() {
            this.src = "/MyContacts/public/images/home.png";
        };
    </script>
</body>

</html>