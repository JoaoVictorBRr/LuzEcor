<?php

class InformacaoEmpresa
{
    private ?int $id;
    private string $Tel;
    private string $Insta;
    private string $Face;
    private ?string $data_update; 

    public function __construct(?int $id, string $Tel, string $Insta, string $Face, ?string $data_update){
        $this->id = $id;
        $this->Tel = $Tel;
        $this->Insta = $Insta;
        $this->Face = $Face;
        $this->data_update = $data_update;
    } 

    public function getId(): int
    {
        return $this->id;
    }
    public function getTel(): string
    {
        return $this->Tel;
    }
    public function getInsta(): string
    {
        return $this->Insta;
    }
    public function getFace(): string
    {
        return $this->Face;
    }
    public function getDataUpdate(): string
    {
        return $this->data_update;
    }
   

}

