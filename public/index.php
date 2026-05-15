<?php
$paginaIndex = true;
require_once '../app/Views/partials/head.php';
require_once __DIR__ . '/../vendor/autoload.php';

?>


<body class="d-flex flex-column vh-100" style="background-color: #EBEBEB;">
    <?php require_once '../app/Views/partials/header.php' ?>



    <main style="background-color: #A0D0E4; border-bottom-left-radius: 10px; border-bottom-right-radius:10px" class="shadow mt-5 mb-3 container  flex-fill ">

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
        <section class="apresentacao row d-flex flex-column align-items-center justify-content-center" style="height: 100%;">
            <h1 class="col-auto mt-4">Bem-Vindo A Sua Lista De Contatos</h1>
            <div class="tituloEparagrafo  col-10 d-flex flex-row align-items-center justify-content-between">

                <div class="textoEbtn d-flex flex-column mb-5">
                    <p class="lead">Gerencie seus contatos de maneira simples e eficiente com <mark>MyContacts</mark>.</p>

                    <a style="height: 72px; width: 320px;" class="shadow btn btn-outline-primary align-self-center" href="/app/Views/auth/cadastro.php">
                        <p class="mt-3 fs-5">Gerenciar meus contatos</p>
                    </a>
                </div>

                <div class="card p-2  col-7 mb-3 mt-2 d-flex flex-column justify-content-center align-items-center">

                    <video autoplay muted loop playsinline preload="auto" poster="images/preview.png" style="height: 200px;" class="rounded shadow-lg card-img-top img-fluid  mt-3">
                        <source src="public/images/video_home.webm" type="video/webm">

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


    <script src="../../../public/js/btnLogout.js"></script>

    <?php require_once '../app/Views/partials/footer.php' ?>

    <script>
        const img = document.getElementById("imgList");

        img.onerror = function() {
            this.src = "/MyContacts/public/images/home.png";
        };
    </script>
</body>

</html>