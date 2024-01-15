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
        $sql = "SELECT title FROM decoracoes WHERE id = $id";
        $statement = $this->pdo->query($sql);
        $decoracao  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $decoracao['title'];
    }

    public function getDescription($id): string
    {
        $sql = "SELECT summary FROM decoracoes WHERE id = $id";
        $statement = $this->pdo->query($sql);
        $decoracao  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $decoracao['summary'];
    }

    public function getFoto($idImage): string
    {
        $sql = "SELECT * FROM imagens WHERE id = $idImage";
        $statement = $this->pdo->query($sql);
        $imagem  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $imagem['arquivo'];
    }

    public function getFotoCapa($idDecoracao): ?string
    {
        $sql = "SELECT file_path FROM decoracoes WHERE id = $idDecoracao";
        $statement = $this->pdo->query($sql);
        $imagem  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $imagem['file_path'];
    }

    public function getFavorito($id): int
    {
        $sql = "SELECT highlighted FROM decoracoes WHERE id = $id";
        $statement = $this->pdo->query($sql);
        $favorito  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $favorito['highlighted'];
    }

    public function salvarDecoracoes(Decoracao $decoracao): int
    {
        $sql = "INSERT INTO decoracoes (title, summary, highlighted, data_update, file_path) VALUES (?, ?, ?, NOW(), ?)";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $decoracao->getTitle());
        $statement->bindValue(2, $decoracao->getSummary());
        $statement->bindValue(3, $decoracao->getHighlighted());
        $statement->bindValue(4, $decoracao->getFilePath());
        $statement->execute();

        $ultimoIdInserido = (int) $this->pdo->lastInsertId();
        return $ultimoIdInserido;
    }

    public function salvarImagem(Decoracao $decoracao): int
    {
        $sql = "INSERT INTO decoracoes (data_update, file_path) VALUES (NOW(), ?)";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $decoracao->getFilePath());
        $statement->execute();

        $ultimoIdInserido = (int) $this->pdo->lastInsertId();
        return $ultimoIdInserido;
    }

    public function atualiarDecoracoes(Decoracao $decoracao, $id)
    {
        $sql = "UPDATE decoracoes SET title=?, summary=?, highlighted=?, data_update=NOW(), file_path=? WHERE id=$id";

        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $decoracao->getTitle());
        $statement->bindValue(2, $decoracao->getSummary());
        $statement->bindValue(3, $decoracao->getHighlighted());
        $statement->bindValue(4, $decoracao->getFilePath());
        $statement->execute();
        
    } 

    public function deletar(int $id)
    {
        //Atualiza o arquivo para valor nulo
        $sql = "UPDATE decoracoes SET file_path = NULL WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $id);

        $statement->execute();
    }

    public function deletarProduto(int $id)
    {
        $sql = "DELETE FROM decoracoes WHERE id = ?";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $id);

        $statement->execute();
    }


}