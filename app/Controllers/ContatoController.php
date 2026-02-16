<?php


namespace PROJETO\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use PROJETO\Models\Contatos;

class ContatoController {

    public static function criandoContato(){
        $n = $_POST['nome'];
        $e = $_POST['email'];
        $c = $_POST['celular'];

        $contato = new Contatos($n,$e,$c);

        
    }
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    ContatoController::criandoContato();
}
