<?php

class DecoracaoRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function listaDecoracao(): array
    {
        $sql = "SELECT * FROM decoracoes ORDER BY data_update";
        $statement = $this->pdo->query($sql);
        $decoracoes =  $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosDecoracao = array_map(function ($decoracao){
            return new Decoracao(
                $decoracao['id'],
                $decoracao['title'],
                $decoracao['summary'],
                $decoracao['file_path'],
                $decoracao['highlighted'],
                $decoracao['data_update']
            );
        },  $decoracoes);
        return $dadosDecoracao;
    }
    
    public function getTitle($id): string
    {
        $sql = "SELECT * FROM decoracoes WHERE id = $id";
        $statement = $this->pdo->query($sql);
        $decoracao  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $decoracao['title'];
    }

    public function getDescription($id): string
    {
        $sql = "SELECT * FROM decoracoes WHERE id = $id";
        $statement = $this->pdo->query($sql);
        $decoracao  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $decoracao['summary'];
    }
}