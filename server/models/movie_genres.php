<?php
require_once("Model.php");

class Ticket extends Model{

    private int $movieId; 
    private int $genreId; 
    
    protected static string $table = "movie_genres";

    public function __construct(array $data){
        $this->movieId = $data["movie_id"];
        $this->genreId = $data["genre_id"];
    }

    public function getMovieId(): int {
        return $this->movieId;
    }

    public function getGenreId(): int {
        return $this->genreId;
    }

    public function setMovieId(int $movieId){
        $this->movieId = $movieId;
    }

    public function setGenreId(int $genreId){
        $this->genreId = $genreId;
    }

    public function toArray(){
        return [$this->genreId, $this->movieId];
    }
    
}