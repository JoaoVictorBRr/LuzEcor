<?php

class UsuarioRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getUsuario(): string
    {
        $sql = "SELECT * FROM user";
        $statement = $this->pdo->query($sql);
        $username = $statement->fetch(PDO::FETCH_ASSOC);

        return $username['username'];
    }

    public function getSenha(): string
    {
        $sql = "SELECT * FROM user";
        $statement = $this->pdo->query($sql);
        $senha  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $senha['password_hash'];
    }

  
}