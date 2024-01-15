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

    public function salvarDecoracoes(Parceria $parcerio)
    {
        $sql = "INSERT INTO parcerias (nome, localizacao, horario, celular, file_path, data_update) VALUES (?, ?, ?, ?, ?, NOW())";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $parcerio->getNome());
        $statement->bindValue(2, $parcerio->getLocalizacao());
        $statement->bindValue(3, $parcerio->getHorario());
        $statement->bindValue(4, $parcerio->getCelular());
        $statement->bindValue(5, $parcerio->getFilePath());

        $statement->execute();
      
    } 

    public function getNome(int $id){
        $sql = "SELECT nome FROM parcerias WHERE id = $id";
        $statement = $this->pdo->query($sql);

        $parceria  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $parceria['nome'];
    }

    public function getLocal(int $id){
        $sql = "SELECT localizacao FROM parcerias WHERE id = $id";
        $statement = $this->pdo->query($sql);

        $parceria  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $parceria['localizacao'];
    }

    public function getCelular(int $id){
        $sql = "SELECT celular FROM parcerias WHERE id = $id";
        $statement = $this->pdo->query($sql);

        $parceria  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $parceria['celular'];
    }

    public function getHorario(int $id){
        $sql = "SELECT horario FROM parcerias WHERE id = $id";
        $statement = $this->pdo->query($sql);

        $parceria  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $parceria['horario'];
    }

    public function getFoto(int $id){
        $sql = "SELECT file_path FROM parcerias WHERE id = $id";
        $statement = $this->pdo->query($sql);

        $parceria  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $parceria['file_path'];
    }
}