<?php

namespace PROJETO\config;

use PDO;
use PDOException;

class Database
{



    private $database = 'lista_de_contatos'; //if0_41912816_
    private $username = 'root'; //if0_41912816
    private $password = ''; //zBiBljwVXSfQv
    private $host = 'localhost'; //sql308.infinityfree.com


    public function realizandoConexao()
    {
        try {
            return new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
        } catch (PDOException $err) {
            echo "Não foi possivel realizar a conexão com o banco de dados: " . $err->getMessage();
        }
    }
}
