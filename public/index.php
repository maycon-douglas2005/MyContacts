<?php
$paginaIndex = true;
require_once '../app/Views/partials/head.php';
require_once __DIR__ . '/../vendor/autoload.php';

?>


<body class="d-flex flex-column vh-100" style="background-color: #EBEBEB;">
    <?php require_once '../app/Views/partials/header.php' ?>



    <main style="background-color: #A0D0E4; border-bottom-left-radius: 10px; border-bottom-right-radius:10px" class="shadow mt-3 mb-3 container  flex-fill ">

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
        <section class="apresentacao my-2 mt-lg-0 row d-flex flex-column flex-lg-row align-items-center justify-content-center" style="height: 100%;">
            <div class=" col-12 col-lg-5 d-flex flex-column align-items-center justify-content-center">
                <h1 class="ms-0 ms-md-4 ms-xl-3 w-100 text-center text-lg-start" style="font-size: 34px; font-weight: 700;">Seus contatos organizados <br> em um só lugar.</h1>

                <div class="textoEbtn d-flex flex-column align-items-center">
                    <p class="lead  w-100 ms-0 ms-md-4 text-center text-lg-start">Gerencie seus contatos de maneira simples e eficiente com <mark>MyContacts.</mark></p>

                    <a style="height: 72px; width: 320px;" class="shadow text-center d-flex align-items-center justify-content-center btn fs-5 btn-primary" href="<?php echo $userLogado === true ? "/app/Views/contacts/listaDeContatos.php" : "/app/Views/auth/cadastro.php"; ?> ">
                        Gerenciar meus contatos
                    </a>
                </div>
            </div>

            <div class="col-12 col-lg-7 d-none d-md-flex flex-column align-items-center">


                <video
                    autoplay
                    muted
                    loop
                    playsinline
                    preload="auto"
                    poster="/public/images/poster.png"
                    class=" rounded shadow-lg mt-3 ">
                    <source src="/public/images/video.webm" type="video/webm">
                </video>

                <div class=" align-self-center">
                    <p class="card-text text-muted small fst-italic mb-2 mb-lg-0">
                        Veja o sistema em ação
                    </p>
                </div>

            </div>

        </section>






    </main>


    <script src="../../../public/js/btnLogout.js"></script>

    <?php require_once '../app/Views/partials/footer.php' ?>


</body>

</html>