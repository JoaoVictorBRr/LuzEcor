<?php

class Parceria
{
    private ?int $id;
    private string $nome;
    private string $local;
    private string $horario;
    private string $foto;
    private int $tel;

    public function __construct(?int $id, string $nome, string $local, string $horario, string $foto, int $tel){
        $this->id = $id;
        $this->nome = $nome;
        $this->local = $local;
        $this->horario = $horario;
        $this->foto = $foto;
        $this->tel = $tel;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function getLocal(): string
    {
        return $this->local;
    }
    public function getHorario(): string
    {
        return $this->horario;
    }
    public function getFoto(): string
    {
        return $this->foto;
    }
    public function getTelefone(): int
    {
        return $this->tel;
    }
    
}

