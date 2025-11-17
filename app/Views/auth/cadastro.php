<?php

session_start();
$baseUrl = '/lista_de_contatos/public/index.php';
$homeDisabled = true;
require_once '../partials/head.php';


?>

<body class="d-flex flex-column vh-100">
    <?php require_once '../partials/header.php' ?>


    <main class="container-fluid d-flex flex-fill ">
        <div class="row vw-100 d-flex flex-row justify-content-center">
            <form action="http://localhost/MyContacts/app/Controllers/UsuarioController.php" method="POST" class="col-4 shadow-lg mb-2 d-flex flex-column justify-content-center align-items-center">
                <h2>Registro</h2>
                <div class="campos d-flex flex-column row g-2">

                    <?php 
                    if (isset($_GET['erroCamposVaziosCadastro'])):  ?> 
                        <p class="alert alert-danger">Preencha todos os campos!</p> 
                    <?php endif; ?>
                    
                    <?php
                    if(isset($_GET['erroFormatoEmail'])):?> 
                        <p class="alert alert-danger">Formato de email inválido!</p> 
                    <?php endif; ?>
                    
                    <?php
                    if(isset($_GET['erroEmailCadastrado'])): ?> 
                        <p class="alert alert-danger">Este email já está cadastrado. Por favor, escolha outro email.</p> 
                    <?php endif; ?>

                    <input type="text" name="name" class="col-auto" placeholder="Primeiro Nome">
                    <input type="email" name="email" class="col-auto" placeholder="Email">
                    <input type="password" name="password" class="col-auto" placeholder="Senha" minlength="4">

                    <button class="btn btn-success btn-outline-black">Enviar</button>
                </div>



            </form>
        </div>

    </main>


    <?php require_once '../partials/footer.php' ?>
</body>

</html>