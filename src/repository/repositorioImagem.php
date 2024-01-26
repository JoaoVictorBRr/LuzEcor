<?php

class ImagemRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function listaImagem($id): array
    {
        try{
        $sql = "SELECT * FROM imagens WHERE produto = ?";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $id);
        $statement->execute();

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
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function listaImagemGeral(): array
    {
        try{
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
    }catch (PDOException $e) {

        echo "Erro de banco de dados: " . $e->getMessage();
    } catch (Exception $e) {

        echo "Erro: " . $e->getMessage();
    }
    }

    public function salvarImagem(Imagem $imagem, int $id)
    {   
        try{
        $sql = "INSERT INTO imagens (produto, arquivo, data_update) VALUES (?, ?, NOW())";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $id);
        $statement->bindValue(2, $imagem->getArquivo());

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
        $sql = "DELETE FROM imagens WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $id);
        $statement->execute();
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function idProduto($idImagem): int
    {
        try{
        $sql = "SELECT produto FROM imagens WHERE id = ?";

        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $idImagem);
        $statement->execute();

        $idProduto = $statement->fetch(PDO::FETCH_ASSOC);

        return $idProduto['produto'];

        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function imagemUnicaProduto($id): string
    {
        try{
            $sql = "SELECT arquivo FROM imagens WHERE id = ?";
            $statement = $this->pdo->prepare($sql);

            $statement->bindValue(1, $id);
            $statement->execute();

            $imagem = $statement->fetch(PDO::FETCH_ASSOC);

            return $imagem['arquivo'];

        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }
}