<?php

class parceriaRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function listaParceria(): array{
        try{
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
    }catch (PDOException $e) {

        echo "Erro de banco de dados: " . $e->getMessage();
    } catch (Exception $e) {

        echo "Erro: " . $e->getMessage();
    }   
    }

    public function salvarDecoracoes(Parceria $parcerio)
    {
        try{
        $sql = "INSERT INTO parcerias (nome, localizacao, horario, celular, file_path, data_update) VALUES (?, ?, ?, ?, ?, NOW())";
        $statement = $this->pdo->prepare($sql);
       
        $statement->bindValue(1, $parcerio->getNome());
        $statement->bindValue(2, $parcerio->getLocalizacao());
        $statement->bindValue(3, $parcerio->getHorario());
        $statement->bindValue(4, $parcerio->getCelular());
        $statement->bindValue(5, $parcerio->getFilePath());

        $statement->execute();
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
      
    } 

    public function getNome(int $id){
        try{
        $sql = "SELECT nome FROM parcerias WHERE id = ?";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $id);
        $statement->execute();

        $parceria  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $parceria['nome'];
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function getLocal(int $id){
        try{
        $sql = "SELECT localizacao FROM parcerias WHERE id = ?";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $id);
        $statement->execute();

        $parceria  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $parceria['localizacao'];
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function getCelular(int $id){
        try{
        $sql = "SELECT celular FROM parcerias WHERE id = ?";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $id);
        $statement->execute();

        $parceria  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $parceria['celular'];
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function getHorario(int $id){
        try{
        $sql = "SELECT horario FROM parcerias WHERE id = ?";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $id);
        $statement->execute();

        $parceria  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $parceria['horario'];
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function getFoto(int $id): string
    {
        try{
        $sql = "SELECT file_path FROM parcerias WHERE id = ?";

        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $id);
        $statement->execute();

        $parceria  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $parceria['file_path'];
        
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function atualizarFoto(string $nomeArquivo, int $id){
        try{
        $sql = "UPDATE parcerias SET file_path = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(1, $nomeArquivo);
        $statement->bindValue(2, $id);

        $statement->execute();
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
   }

   public function atualizarParceria(Parceria $parcerio ,int $id){
    try{
    $sql = "UPDATE parcerias SET nome = ?, localizacao = ?, horario = ?, celular = ?, file_path = ? WHERE id = ?";
    $statement = $this->pdo->prepare($sql);

    $statement->bindValue(1, $parcerio->getNome());
    $statement->bindValue(2, $parcerio->getLocalizacao());
    $statement->bindValue(3, $parcerio->getHorario());
    $statement->bindValue(4, $parcerio->getCelular());
    $statement->bindValue(5, $parcerio->getFilePath());
    $statement->bindValue(6, $id);

    $statement->execute();
    }catch (PDOException $e) {

        echo "Erro de banco de dados: " . $e->getMessage();
    } catch (Exception $e) {

        echo "Erro: " . $e->getMessage();
    }
   }

   public function deletarParceria(int $id){
    try{
    
    $sql = "DELETE FROM parcerias WHERE id = ?";

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
