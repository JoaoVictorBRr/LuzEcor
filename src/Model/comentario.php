<?php



class Comentario
{
    private int $id;
    private string $nome;
    private string $comentario;
    private string $foto;
    private int $produto_id;
    private string $data_update; 

    public function __construct(int $id, string $nome, string $comentario, string $foto, int $produto_id, string $data_update){
        $this->id = $id;
        $this->nome = $nome;
        $this->comentario = $comentario;
        $this->foto = $foto;
        $this->produto_id = $produto_id;
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
    public function getComentario(): string
    {
        return $this->comentario;
    }
 
    public function getFoto(): string
    {
        return $this->foto;
    }
    public function getProdutoId(): int
    {
        return $this->produto_id;
    }
    public function getDataUpdate(): string
    {
        return $this->data_update;
    }
   

}

