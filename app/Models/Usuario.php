<?php

namespace PROJETO\Models;

use PROJETO\config\Database;

require 'http://localhost/Projetos%20de%20Programação/lista_de_contatos/config/Database.php';



class Usuario
{
    private $name;
    private $email;
    private $password;


    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function cadastrarUsuario()
    {
        $bd = new Database();
        $querie = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $bd->realizandoConexao()->prepare($querie);
        $stmt->bindParam(":nome", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->execute();
    }
}
