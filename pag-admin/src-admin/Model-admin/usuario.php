<?php

class Usuario
{
    private ?int $id;
    private string $User;
    private string $Senha;


    public function __construct(?int $id, string $User, string $Senha){
        $this->id = $id;
        $this->User = $User;
        $this->Senha = $Senha;

    } 

    public function getUser(): string
    {
        return $this->User;
    }
    public function getSenha(): string
    {
        return $this->Senha;
    }
   

}

