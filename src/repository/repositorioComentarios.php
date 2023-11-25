<?php

class ComentarioRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function listaComentario($id): array
    {
        $sql = "SELECT * FROM feedback WHERE produto_id = $id";
        $statement = $this->pdo->query($sql);
        $comentarios =  $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosComentarios = array_map(function ($comentario){
            return new Comentario(
                $comentario['id'],
                $comentario['nome'],
                $comentario['comentario'],
                $comentario['foto'],
                $comentario['produto_id'],
                $comentario['data_update']
            );
        },  $comentarios);
        return $dadosComentarios;
    }

    public function salvarComentario(Comentario $comentario)
    {
        $sql = "INSERT INTO feedback (nome, comentario, foto, produto_id, data_update) VALUE (?, ?, ?, ?, NOW())";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $comentario->getNome());
        $statement->bindValue(2, $comentario->getComentario());
        $statement->bindValue(3, $comentario->getFoto());
        $statement->bindValue(4, $comentario->getProdutoId());
        $statement->execute();
        
    }
    
  
}