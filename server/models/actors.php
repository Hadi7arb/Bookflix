<?php
require_once("Model.php");

class Ticket extends Model{

    private string $actorName; 
    private int $genreId; 
    
    protected static string $table = "actors";

    public function __construct(array $data){
        $this->actorName= $data["name"];
        $this->actorId = $data["actor_id"];
    }

    public function getActorName(): string {
        return $this->actorName;
    }

    public function getActorId(): int {
        return $this->actorId;
    }

    public function setActorName(string $actorName){
        $this->actorName = $actorName;
    }

    public function toArray(){
        return [$this->actorId, $this->actorName];
    }
    
}