<?php

namespace PROJETO\config;

use PDO;
use PDOException;

class Database
{
    private $database = 'ezyro_40942532_lista_de_contatos';
    private $username = 'ezyro_40942532';
    private $password = '4d0a6f1218c6';
    private $host = 'sql100.ezyro.com';

    public function realizandoConexao()
    {
        try {
            return new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
        } catch (PDOException $err) {
            echo "Não foi possivel realizar a conexão com o banco de dados: " . $err->getMessage();
        }
    }
}
