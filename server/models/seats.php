<?php
require_once("Model.php");

class seats extends Model{

    private int $seats_id; 
    private string $seatNb; 
    private string $seatRow; 
    private string $seatColumn; 
    private int $auditoriumId;


    protected static string $table = "seats";

    public function __construct(array $data){
        $this->seatsId = $data["seats_id"];
        $this->seatNb = $data["seat_nb"];
        $this->seatRow = $data["seat_row"];
        $this->seatColumn = $data["seat_column"];
        $this->auditoriumId = $data["auditorium_id"];
    }

    public function getSeatsId(): int {
        return $this->seatsId;
    }

    public function getSeatNb(): string {
        return $this->seatNb;
    }

    public function getSeatRow(): string {
        return $this->seatRow;
    }

    public function getSeatColumn(): string {
        return $this->seatColumn;
    }

    public function getAuditoriumId(): int {
        return $this->auditroiumId;
    }

    public function setSeatNb(int $seatNb){
        $this->seatNb = $seatNb;
    }

    public function setSeatRow(string $seatRow){
        $this->seatRow = $seatRow;
    }

    public function setseatColumn(string $seatColumn){
        $this->seatColumn = $seatColumn;
    }

    public function setAuditoriumId(int $auditoriumId){
        $this->auditoriumId = $auditoriumId;
    }

    public function toArray(){
        return [$this->seatsId, $this->seatNb, $this->seatRow, $this->seatColumn, $this->auditoriumId];
    }
    
}