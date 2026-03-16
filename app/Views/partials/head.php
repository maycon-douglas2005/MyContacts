<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Lista de Contatos</title>
    <link id="main-style" rel="stylesheet" href="<?= isset($paginaIndex) ? "/public/css/main.css" : "../../../public/css/main.css" ?>">
    <!-- Correção temporária para alterar caminho de arquivo css -->
    <script>
        const link = document.getElementById("main-style");

        link.onerror = function() {

            link.href = "/MyContacts/public/css/main.css";
            link.onerror = function() {

                link.href = "css/main.css";
            };
        };
    </script>
</head>