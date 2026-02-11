<header class="container-fluid  d-flex flex-row justify-content-between">
    <div class="logo row-6">
        <a class="col-auto btn fw-bold fs-5" href="<?= isset($arquivoUrl) ? "" : "../../../public/index.php" ?>">Lista De Contatos</a>
    </div>
    <nav class="row-6">
        <ul class="col-auto list-unstyled d-flex flex-row">
            <li class="mx-2 btn">
                <a href="
                <?= isset($arquivoUrl) ? "../app/Views/contacts/listaDeContatos.php" : "../contacts/listaDeContatos.php
                "
                ?>
                "
                    class="
                <?php if (isset($arquivoUrl)): ?> d-none <?php endif; ?>text-dark text-decoration-none btn btn-outline-secondary">Home</a>
            </li>

            <li class="mx-2 btn">
                <a href="<?= isset($arquivoUrl) ? "../app/Views/auth/cadastro.php" : "../auth/cadastro.php" ?>" class="<?php if (isset($cadastroDisabled) && $$arquivoUrl === true): ?> d-none <?php endif; ?> text-dark text-decoration-none btn btn-outline-secondary">Cadastro</a>
            </li>

            <li class="mx-2 btn">
                <a href="<?= isset($arquivoUrl) ? "../app/Views/auth/login.php" : "../auth/login.php" ?>" class="<?php if (isset($loginDisabled) && $$arquivoUrl === true): ?> d-none <?php endif; ?> text-dark text-decoration-none btn btn-outline-secondary">Login</a>
            </li>
        </ul>
    </nav>
</header>
<hr class="mt-0">