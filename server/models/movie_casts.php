<?php
require_once("Model.php");

class Ticket extends Model{

    private int $movieId; 
    private int $genreId; 
    
    protected static string $table = "movie_casts";

    public function __construct(array $data){
        $this->movieId = $data["movie_id"];
        $this->actorId = $data["actor_id"];
    }

    public function getMovieId(): int {
        return $this->movieId;
    }

    public function getActorId(): int {
        return $this->actorId;
    }

    public function setMovieId(int $movieId){
        $this->movieId = $movieId;
    }

    public function setActorId(int $genreId){
        $this->ActorId = $actorId;
    }

    public function toArray(){
        return [$this->actorId, $this->movieId];
    }
    
}