<?php

class UsuarioRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getUsuario(): string
    {
        try{
        $sql = "SELECT * FROM user";
        $statement = $this->pdo->query($sql);
        $username = $statement->fetch(PDO::FETCH_ASSOC);

        return $username['username'];
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

    public function getSenha(): string
    {
        try{
        $sql = "SELECT * FROM user";
        $statement = $this->pdo->query($sql);
        $senha  =  $statement->fetch(PDO::FETCH_ASSOC);

        return $senha['password_hash'];
        }catch (PDOException $e) {

            echo "Erro de banco de dados: " . $e->getMessage();
        } catch (Exception $e) {
    
            echo "Erro: " . $e->getMessage();
        }
    }

  
}