<?php

class ImagemRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function listaImagem($id): array
    {
        $sql = "SELECT * FROM imagens WHERE produto = $id";
        $statement = $this->pdo->query($sql);
        $imagem =  $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosImagem = array_map(function ($imagem){
            return new Imagem(
                $imagem['id'],
                $imagem['produto'],
                $imagem['arquivo'],
          
            );
        },  $imagem);
        return $dadosImagem;
    }
    

}