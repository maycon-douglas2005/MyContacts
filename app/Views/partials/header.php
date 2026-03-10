<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$userLogado = false;
if (isset($_SESSION['usuario']['id'])) {
    $userLogado = true;
} ?>

<header class="container-fluid  d-flex flex-row justify-content-between">
    <div class="logo row-6">
        <a class="col-auto btn fw-bold fs-5" href="<?= isset($arquivoUrl) ? "" : "../../../public/index.php" ?>">Lista
            De Contatos</a>
    </div>
    <nav class="row-6">
        <ul class="col-auto list-unstyled d-flex flex-row">
            <li class="mx-2 btn <?php if (!$userLogado): ?> d-none <?php endif; ?> ">
                <a href="
                <?= isset($paginaIndex) ? "../app/Views/contacts/listaDeContatos.php" : "../contacts/listaDeContatos.php
                "
                ?>
                " class="text-dark text-decoration-none btn btn-outline-secondary">Home</a>


            </li>

            <li class="mx-2 btn <?php if ($userLogado): ?> d-none <?php endif; ?>">
                <a href="<?= isset($paginaIndex) ? "../app/Views/auth/cadastro.php" : "../auth/cadastro.php" ?>"
                    class=" text-dark text-decoration-none btn btn-outline-secondary">Cadastro</a>
            </li>

            <li class="mx-2 btn <?php if ($userLogado): ?> d-none <?php endif; ?>">
                <a href="<?= isset($paginaIndex) ? "../app/Views/auth/login.php" : "../auth/login.php" ?>"
                    class=" text-dark text-decoration-none btn btn-outline-secondary">Login</a>
            </li>
        </ul>
    </nav>
</header>