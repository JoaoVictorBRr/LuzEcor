<?php

class InformacaoRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getTelefone(): string
    {
        $sql = "SELECT * FROM contato";
        $statement = $this->pdo->query($sql);
        $telefone  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $telefone['telefone'];
    }

    public function getInstagram(): string
    {
        $sql = "SELECT * FROM contato";
        $statement = $this->pdo->query($sql);
        $instagram  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $instagram['instagram'];
    }

    public function getFacebook(): string
    {
        $sql = "SELECT * FROM contato";
        $statement = $this->pdo->query($sql);
        $facebook  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $facebook['facebook'];
    }

    public function salvarInformacoes(InformacaoEmpresa $informacao)
    {
        $sql = "UPDATE contato SET telefone = ?, instagram = ?, facebook = ?, data_update = NOW() WHERE id = 1";
        $statement = $this->pdo->prepare($sql);
        
        $statement->bindValue(1, $informacao->getTel());
        $statement->bindValue(2, $informacao->getInsta());
        $statement->bindValue(3, $informacao->getFace());

        $statement->execute();
    }
 
  
}