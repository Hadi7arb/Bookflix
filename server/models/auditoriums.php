<?php
require_once("Model.php");

class Ticket extends Model{

    private int $auditoriumId;
    private string $auditoriumNb; 
    private int $capacity;
    private string $screenSize; 
    
    protected static string $table = "auditoriums";

    public function __construct(array $data){
        $this->auditoriumId = $data["auditorium_id"];
        $this->auditoriumNb = $data["auditorium_nb"];
        $this->capacity = $data["capacity"];
        $this->screenSize = $data["screen_size"];
    }

    public function getAuditoriumNb(): string {
        return $this->auditoriumNb;
    }

    public function getScreenSize(): string {
        return $this->screenSize;
    }

    public function getCapacity(): int {
        return $this->capacity;
    }

    public function setAuditoriumNb(int $auditoriumNb){
        $this->auditoriumNb = $auditoriumNb;
    }

    public function setScreenSize(int $screenSize){
        $this->screenSize = $screenSize;
    }

    public function setCapacity(string $capacity){
    $this->capacity = $capacity;
}

    public function toArray(){
        return [$this->auditoriumId, $this->auditoriumNb, $this->capacity, $this->screenSize];
    }
    
}