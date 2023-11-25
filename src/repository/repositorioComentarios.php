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
    
  
}