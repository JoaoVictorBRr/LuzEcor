<?php

class DecoracaoRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function listaDecoracao(): array
    {
    try{

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
      }catch (PDOException $e) {

        echo "Erro de banco de dados: " . $e->getMessage();
    } catch (Exception $e) {

        echo "Erro: " . $e->getMessage();
    }
    }
    
    public function getTitle($id): string
    {
        try{ 
            $sql = "SELECT title FROM decoracoes WHERE id = ?";

            $statement = $this->pdo->prepare($sql);

            $statement->bindValue(1, $id);
            $statement->execute();

            $decoracao  =  $statement->fetch(PDO::FETCH_ASSOC);

            return $decoracao['title'];
        } catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function getDescription($id): string
    {
        try{
        
            $sql = "SELECT summary FROM decoracoes WHERE id = ?";

            $statement = $this->pdo->prepare($sql);

            $statement->bindValue(1, $id);
            $statement->execute();

            $decoracao  =  $statement->fetch(PDO::FETCH_ASSOC);

            return $decoracao['summary'];
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function getFoto($idImage): string
    {
    try{
        $sql = "SELECT * FROM imagens WHERE id = ?";

        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $idImage);
        $statement->execute();

        $imagem  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $imagem['arquivo'];
    }catch (PDOException $e) {

        echo "Erro de banco de dados: " . $e->getMessage();
    } catch (Exception $e) {

        echo "Erro: " . $e->getMessage();
    }
    }

    public function getFotoCapa($idDecoracao): ?string
    {
        try{ 
        $sql = "SELECT file_path FROM decoracoes WHERE id = ?";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $idDecoracao);
        $statement->execute();

        $imagem = $statement->fetch(PDO::FETCH_ASSOC);

        return $imagem['file_path'];
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function getFavorito($id): int
    {
        try{
        $sql = "SELECT highlighted FROM decoracoes WHERE id = ?";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $id);
        $statement->execute();

        $favorito  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $favorito['highlighted'];
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function salvarDecoracoes(Decoracao $decoracao): int
    {
        try{
        $sql = "INSERT INTO decoracoes (title, summary, highlighted, data_update, file_path) VALUES (?, ?, ?, NOW(), ?)";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $decoracao->getTitle());
        $statement->bindValue(2, $decoracao->getSummary());
        $statement->bindValue(3, $decoracao->getHighlighted());
        $statement->bindValue(4, $decoracao->getFilePath());
        $statement->execute();

        $ultimoIdInserido = (int) $this->pdo->lastInsertId();
        return $ultimoIdInserido;
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function salvarImagem(Decoracao $decoracao): int
    {
        try{
        $sql = "INSERT INTO decoracoes (data_update, file_path) VALUES (NOW(), ?)";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $decoracao->getFilePath());
        $statement->execute();

        $ultimoIdInserido = (int) $this->pdo->lastInsertId();
        return $ultimoIdInserido;
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function atualiarDecoracoes(Decoracao $decoracao, $id)
    {
        try{
        $sql = "UPDATE decoracoes SET title=?, summary=?, highlighted=?, data_update=NOW(), file_path=? WHERE id= ?";

        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $decoracao->getTitle());
        $statement->bindValue(2, $decoracao->getSummary());
        $statement->bindValue(3, $decoracao->getHighlighted());
        $statement->bindValue(4, $decoracao->getFilePath());
        $statement->bindValue(5, $id);
        $statement->execute();
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
        
    } 

    public function deletar(int $id)
    {
        try{
        //Atualiza o arquivo para valor nulo
        $sql = "UPDATE decoracoes SET file_path = NULL WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $id);

        $statement->execute();
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function deletarProduto(int $id)
    {
        try{
        $sql = "DELETE FROM decoracoes WHERE id = ?";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $id);

        $statement->execute();
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }
}