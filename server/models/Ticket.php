<?php
require_once("Model.php");

class Ticket extends Model{

    private int $id; 
    private string $seatNb; 
    private float $price; 
    private int $bookingId; 
    
    protected static string $table = "tickets";

    public function __construct(array $data){
        $this->id = $data["ticket_id"];
        $this->seatNb = $data["seat_number"];
        $this->price = $data["price"];
        $this->bookingId = $data["booking_id"];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getSeatNb(): string {
        return $this->seatNb;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getBookingId(): int {
        return $this->bookingId;
    }

    public function setSeatNb(string $seatNb){
        $this->seatNb = $seatNb;
    }

    public function setPrice(float $price){
        $this->price = $price;
    }
    public function setBookingId(int $bookingId){
        $this->bookingId = $bookingId;
    }

    public function toArray(){
        return [$this->id, $this->seatNb, $this->price, $this->bookingId];
    }
    
}