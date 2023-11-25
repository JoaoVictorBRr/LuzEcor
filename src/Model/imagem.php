<?php



class Imagem
{
    private int $id;
    private int $produto;
    private string $arquivo;

    public function __construct(int $id, int $produto, string $arquivo){
        $this->id = $id;
        $this->produto = $produto;
        $this->arquivo = $arquivo;
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
   

}

