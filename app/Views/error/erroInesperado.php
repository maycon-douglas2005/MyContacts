<?php 

require_once '../partials/head.php'; 
?>

<body class="d-flex flex-column vh-100">
    <?php include_once '../partials/header.php'; ?>
    <main class="container-fluid d-flex flex-column align-items-center">
        <div class="divErro alert alert-danger">
            <h2>ERRO FATAL</h2>
            <hr>
            <p>Um erro não identificado aconteceu. Pedimos desculpas pelo incoveniente.<br>Por favor tente novamente mais tarde.</p>
            <hr>
            

        </div>

        <a href="../../../public/index.php" class="btn btn-success">Voltar</a>
    </main>


    <?php require_once '../partials/footer.php' ?>
</body>

</html>