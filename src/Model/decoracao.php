<?php



class Decoracao
{
    private int $id;
    private string $title;
    private string $summary;
    private string $file_path;
    private int $highlighted;
    private string $data_update; 

    public function __construct(int $id, string $title, string $summary, string $file_path, int $highlighted, string $data_update){
        $this->id = $id;
        $this->title = $title;
        $this->summary = $summary;
        $this->file_path = $file_path;
        $this->highlighted = $highlighted;
        $this->data_update = $data_update;
    } 

    public function getId(): int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
 
    public function getFilePath(): string
    {
        return $this->file_path;
    }
    public function getHighlighted(): int
    {
        return $this->highlighted;
    }
    public function getDataUpdate(): string
    {
        return $this->data_update;
    }

}

