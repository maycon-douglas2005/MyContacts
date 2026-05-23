<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$userLogado = null;
$nomeUsuario = null;

if (isset($_SESSION['usuario']['id'])) {
    $userLogado = true;
    $nomeUsuario = $_SESSION['usuario']['nome'];
} else {
    $userLogado = null;
}
$paginaAtual = basename($_SERVER['PHP_SELF']);
$showNameUser = $nomeUsuario !== null ? "d-flex d-md-block" : "d-none";
?>

<header style="background-color: #A0D0E4; border-top-left-radius: 10px; border-top-right-radius: 10px;" class=" container d-flex flex-row justify-content-between align-items-center mt-3 p-1 shadow">
    <!-- HEADER TABLET/DESKTOP -->
    <div class="logo row-6 d-none d-md-flex  flex-column justify-content-center ">

        <p style="font-family: 'Inter', sans-serif;" class="m-0 p-0 ms-2 text-white col-auto  fw-bold fs-5 logolink">MyContacts</p>
    </div>
    <p class="<?= $showNameUser ?> mb-0 text-light fw-semibold fs-5 d-none d-md-flex"><?php if ($nomeUsuario !== null) echo "Olá, $nomeUsuario"  ?></p>
    <nav class="row-6 d-none d-md-flex">
        <ul class="  m-0 p-0 col-auto list-unstyled d-flex flex-row  ">



            <li class=" mx-2 btn <?php if ($userLogado || $paginaAtual === "cadastro.php"): ?> d-none <?php endif; ?>">
                <a style="font-family: 'Inter', sans-serif;" href="<?= isset($paginaIndex) ? "../app/Views/auth/cadastro.php" : "../auth/cadastro.php" ?>"
                    class="shadow   text-decoration-none btn btn-outline-primary">Cadastro</a>
            </li>

            <li class="mx-2 btn  <?php if ($userLogado || $paginaAtual === "login.php"): ?> d-none <?php endif; ?>">
                <a style="font-family: 'Inter', sans-serif;" href="<?= isset($paginaIndex) ? "../app/Views/auth/login.php" : "../auth/login.php" ?>"

                    class="shadow   text-decoration-none btn btn-outline-primary">Login</a>
            </li>




            <li class=" align-self-center text-white text-decoration-none btn  rounded-pill  my-2 mx-2 <?php if (!$userLogado): ?> d-none <?php endif; ?>" id="btnWarningLogout"
                data-bs-toggle="modal"
                data-bs-target="#modalWarningLogout" type="button">

                <i class="bi bi-box-arrow-right" id="iconLogout"></i>
            </li>
        </ul>
    </nav>

    <!-- HEADER MOBILE -->
    <div class="header-mobile d-flex d-md-none justify-content-between  w-100">

        <p style="font-family: 'Inter', sans-serif;" class="m-0 p-0 ms-2 text-white col-auto  fw-bold fs-5 logolink">MyContacts</p>

        <div class="dropdown d-flex d-md-none p">
            <p class="d-flex mb-0 text-light fw-semibold fs-5 dropdown-toggle pe-2" role="button" data-bs-toggle="dropdown"> <?php echo $nomeUsuario !== null ? "Olá, $nomeUsuario" : "<i class='bi bi-list'></i>"; ?></p>

            <div class="dropdown-menu ">
                <a href="" class="dropdown-item">Cadastro</a>
                <a href="" class="dropdown-item">Login</a>
                <a href="" class="dropdown-item">Sair</a>
            </div>
        </div>
    </div>
</header>