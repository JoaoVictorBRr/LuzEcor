<?php

class Parceria
{
    private ?int $id;
    private string $nome;
    private string $localizacao;
    private string $horario;
    private string $celular;
    private string $file_path;
    private ?string $data_update;

    public function __construct(?int $id, string $nome, string $localizacao, string $horario, string $celular, string $file_path, ?string $data_update){
        $this->id = $id;
        $this->nome = $nome;
        $this->localizacao = $localizacao;
        $this->horario = $horario;
        $this->celular = $celular;
        $this->file_path = $file_path;
        $this->data_update = $data_update;
    } 
    public function getId(): int
    {
        return $this->id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function getLocalizacao(): string
    {
        return $this->localizacao;
    }
    public function getHorario(): string
    {
        return $this->horario;
    }
    public function getCelular(): string
    {
        return $this->celular;
    }
    public function getFilePath(): string
    {
        return $this->file_path;
    }
    public function getDataUpdate(): string
    {
        return $this->data_update;
    }
}