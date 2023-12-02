<?php

class parceriaRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }


    public function salvarDecoracoes(Parceria $parcerio)
    {
        $sql = "INSERT INTO parcerias (nome, localizacao, horario, celular, file_path, data_update) VALUES (?, ?, ?, ?, ?, NOW())";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $parcerio->getNome());
        $statement->bindValue(2, $parcerio->getLocal());
        $statement->bindValue(3, $parcerio->getHorario());
        $statement->bindValue(4, $parcerio->getTelefone());
        $statement->bindValue(5, $parcerio->getFoto());

        $statement->execute();
      
    } 
 
  
}