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
                $imagem['data_update']
          
            );
        },  $imagem);
        return $dadosImagem;
    }

    public function listaImagemGeral(): array
    {
        $sql = "SELECT * FROM imagens";
        $statement = $this->pdo->query($sql);
        $imagem =  $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosImagem = array_map(function ($imagem){
            return new Imagem(
                $imagem['id'],
                $imagem['produto'],
                $imagem['arquivo'],
                $imagem['data_update']
          
            );
        },  $imagem);
        return $dadosImagem;
    }

    public function salvarImagem(Imagem $imagem, int $id)
    {
        $sql = "INSERT INTO imagens (produto, arquivo, data_update) VALUES (?, ?, NOW())";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $id);
        $statement->bindValue(2, $imagem->getArquivo());

        $statement->execute();
    }

    public function deletar(int $id)
    {
        $sql = "DELETE FROM imagens WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $id);

        $statement->execute();
    }

    public function idProduto($idImagem): int
    {
        $sql = "SELECT produto FROM imagens WHERE id = $idImagem";
        $statement = $this->pdo->query($sql);
        $idProduto = $statement->fetch(PDO::FETCH_ASSOC);

        return $idProduto['produto'];



    }
    

}