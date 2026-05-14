<?php

namespace PROJETO\config;

use PDO;
use PDOException;

class Database
{


    private $database = 'lista_de_contatos';
    private $username = 'root';
    private $password = '';
    private $host = 'localhost';

    public function realizandoConexao()
    {
        try {
            return new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
        } catch (PDOException $err) {
            echo "Não foi possivel realizar a conexão com o banco de dados: " . $err->getMessage();
        }
    }
}
