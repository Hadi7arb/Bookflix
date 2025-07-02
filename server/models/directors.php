<?php
require_once("Model.php");

class directors extends Model{

    private int $directorId; 
    private string $directorName; 
    
    protected static string $table = "directors";

    public function __construct(array $data){
        $this->directorId = $data["director_id"];
        $this->directorName = $data["director_name"];
    }

    public function getDirectorId(): int {
        return $this->directorId;
    }

    public function getDirectorName(): string {
        return $this->directorName;
    }

    public function setDirectorName(string $directorName){
        $this->directorName = $directorName;
    }

    public function toArray(){
        return [$this->directorId, $this->directorName];
    }
    
}