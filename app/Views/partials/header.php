<header class="container-fluid  d-flex flex-row justify-content-between">
    <div class="logo row-6">
        <a class="col-auto btn fw-bold fs-5" href="<?= $baseUrl ?>">Lista De Contatos</a>
    </div>
    <nav class="row-6">
        <ul class="col-auto list-unstyled d-flex flex-row">
            <li class="mx-2 btn"><a href="http://localhost/lista-de-contatos/app/Views/contacts/listaDeContatos.php" class="<?php if($homeDisabled === true): ?> disabled <?php endif; ?>text-dark text-decoration-none btn btn-outline-secondary">Home</a></li>
            <li class="mx-2 btn"><a href="http://localhost/lista-de-contatos/app/Views/auth/cadastro.php" class="text-dark text-decoration-none btn btn-outline-secondary">Cadastro</a></li>
            <li class="mx-2 btn"><a href="http://localhost/lista-de-contatos/app/Views/auth/login.php" class="text-dark text-decoration-none btn btn-outline-secondary">Login</a></li>
        </ul>
    </nav>
</header>
<hr class="mt-0">