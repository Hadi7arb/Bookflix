<?php
require_once("Model.php");

class Ticket extends Model{

    private int $genreId; 
    private string $genreName; 
    
    protected static string $table = "genres";

    public function __construct(array $data){
        $this->genreId = $data["genre_id"];
        $this->genreName = $data["genre_name"];
    }

    public function getGenreId(): int {
        return $this->genreId;
    }

    public function getGenreName(): string {
        return $this->genreName;
    }

    public function setGenreName(string $genreName){
        $this->genreName = $genreName;
    }

    public function toArray(){
        return [$this->genreId, $this->genreName];
    }
    
}