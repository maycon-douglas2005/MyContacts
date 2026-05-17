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
        <section class="apresentacao row d-flex flex-row align-items-center justify-content-center" style="height: 100%;">
            <div class="col-6 d-flex flex-column align-items-end justify-content-center">
                <h1 class="col-auto " style="font-size: 40px;">Seus contatos organizados <br> em um só lugar.</h1>

                <div class="textoEbtn d-flex flex-column align-items-center">
                    <p class="lead align-self-center ms-4">Gerencie seus contatos de maneira simples e eficiente com <mark>MyContacts.</mark></p>

                    <a style="height: 72px; width: 320px;" class="shadow text-center d-flex align-items-center justify-content-center btn fs-5 btn-outline-primary" href="<?php echo $userLogado === true ? "/app/Views/contacts/listaDeContatos.php" : "/app/Views/auth/cadastro.php"; ?> ">
                        Gerenciar meus contatos
                    </a>
                </div>
            </div>

            <div class="  col-6 d-flex flex-column align-items-center justify-content-between">



                <video autoplay muted loop playsinline preload="auto" poster="/public/images/preview.png" style="height: 325px;" class="bg-white rounded shadow-lg img-fluid  mt-3">
                    <source src="/public/images/video_home.webm" type="video/webm">

                </video>

                <div class=" align-self-center">
                    <p class="card-text text-muted small fst-italic">
                        Veja o sistema em ação
                    </p>
                </div>

            </div>

        </section>




        </div>

    </main>


    <script src="../../../public/js/btnLogout.js"></script>

    <?php require_once '../app/Views/partials/footer.php' ?>


</body>

</html>