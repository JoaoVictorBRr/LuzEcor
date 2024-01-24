<?php

class InformacaoRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getTelefone(): string
    {
        try{
        $sql = "SELECT * FROM contato";
        $statement = $this->pdo->query($sql);
        $telefone  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $telefone['telefone'];
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function getInstagram(): string
    {
        try{
        $sql = "SELECT * FROM contato";
        $statement = $this->pdo->query($sql);
        $instagram  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $instagram['instagram'];
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function getFacebook(): string
    {
        try{
        $sql = "SELECT * FROM contato";
        $statement = $this->pdo->query($sql);
        $facebook  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $facebook['facebook'];
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function salvarInformacoes(InformacaoEmpresa $informacao)
    {
        try{
        $sql = "UPDATE contato SET telefone = ?, instagram = ?, facebook = ?, data_update = NOW() WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        
        $statement->bindValue(1, $informacao->getTel());
        $statement->bindValue(2, $informacao->getInsta());
        $statement->bindValue(3, $informacao->getFace());
        $statement->bindValue(4, 1);

        $statement->execute();
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }
 
  
}