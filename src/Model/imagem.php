<?php



class Imagem
{
    private ?int $id;
    private ?int $produto;
    private string $arquivo;
    private ?string $dataUpdate;

    public function __construct(?int $id, ?int $produto, string $arquivo, ?string $dataUpdate){
        $this->id = $id;
        $this->produto = $produto;
        $this->arquivo = $arquivo;
        $this->dataUpdate = $dataUpdate;
    } 

    public function getId(): int
    {
        return $this->id;
    }
    public function getProduto(): int
    {
        return $this->produto;
    }
    public function getArquivo(): string
    {
        return $this->arquivo;
    }
    public function getDataUpdate(): string
    {
        return $this->dataUpdate;
    }
   

}

