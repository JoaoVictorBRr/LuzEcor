<?php

class parceriaRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function listaParceria(): array{
        $sql = "SELECT * FROM parcerias";
        $statement =  $this->pdo->query($sql);
        $parcerias = $statement->fetchAll(PDO::FETCH_ASSOC); 

        $dadosParceria = array_map(function ($parceria){
        return new Parceria(
            $parceria['id'],
            $parceria['nome'],
            $parceria['localizacao'],
            $parceria['horario'],
            $parceria['celular'],
            $parceria['file_path'],
            $parceria['data_update']
        );    
    }, $parcerias);
    return $dadosParceria;  
    }
}