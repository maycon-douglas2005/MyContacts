<?php 

namespace PROJETO\Models;
require_once __DIR__ . '/../../vendor/autoload.php';
use PROJETO\config\Database;
use PROJETO\Helpers\EmailHelper;


class Contatos{
    private $nome;
    private $email;
    private $celular;
    
    public function __construct($nome,$email,$celular){
        $this->nome = $nome;
        $this->email = $email;
        $this->celular = $celular;
    } 

    public function criarContato($n, $e,$c){
        


    }
}
?>