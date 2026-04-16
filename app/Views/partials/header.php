<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$userLogado;
if (isset($_SESSION['usuario']['id'])) {
    $userLogado = true;
} else {
    $userLogado = false;
} ?>

<header style="background-color: #A0D0E4; border-top-left-radius: 10px; border-top-right-radius: 10px;" class="container d-flex flex-row justify-content-between align-items-center mt-3 shadow">
    <div class="logo row-6">
        <a style="font-family: 'Inter', sans-serif;" class=" text-white col-auto btn fw-bold fs-5 logolink" href="<?= isset($paginaIndex) ? "" : "../../../public/index.php" ?>">MyContacts</a>
    </div>
    <nav class="row-6 d-flex">
        <ul class="  mt-2 col-auto list-unstyled d-flex flex-row  ">


            <li class=" mx-2 btn <?php if ($userLogado): ?> d-none <?php endif; ?>">
                <a style="font-family: 'Inter', sans-serif;" href="<?= isset($paginaIndex) ? "../app/Views/auth/cadastro.php" : "../auth/cadastro.php" ?>"
                    class="mt-2 text-white text-decoration-none btn btn-outline-secondary">Cadastro</a>
            </li>

            <li class="mx-2 btn <?php if ($userLogado): ?> d-none <?php endif; ?>">
                <a style="font-family: 'Inter', sans-serif;" href="<?= isset($paginaIndex) ? "../app/Views/auth/login.php" : "../auth/login.php" ?>"
                    class="mt-2 text-white text-decoration-none btn btn-outline-secondary">Login</a>
            </li>


            <li class="mx-2 btn <?php if (!$userLogado): ?> d-none <?php endif; ?> ">
                <a style="font-family: 'Inter', sans-serif;" href="
                <?= isset($paginaIndex) ? "../app/Views/contacts/listaDeContatos.php" : "../contacts/listaDeContatos.php" ?>"
                    class="text-dark text-decoration-none btn btn-outline-primary">Home</a>
            </li>

            <li class="align-self-center text-dark text-decoration-none btn btn-outline-primary mx-2 <?php if (!$userLogado): ?> d-none <?php endif; ?>" id="btnWarningLogout"
                data-bs-toggle="modal"
                data-bs-target="#modalWarningLogout">

                Sair
            </li>
        </ul>
    </nav>
</header>