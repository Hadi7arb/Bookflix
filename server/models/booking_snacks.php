<?php
require_once("Model.php");

class Ticket extends Model{

    private int $quantity;
    private int $snackId; 
    private int $bookingId; 
    
    protected static string $table = "booking_snack";

    public function __construct(array $data){
        $this->quantity = $data["quantity"];
        $this->snackId = $data["snack_id"];
        $this->bookingId = $data["booking_id"];
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getSnackId(): int {
        return $this->snackId;
    }

     public function getBookingId(): int {
        return $this->bookingId;
    }

    public function setQuanity(int $quantity){
        $this->quantity = $quantity;
    }

    public function setBookingId(int $bookingId){
        $this->bookingId = $bookingId;
    }

    public function toArray(){
        return [$this->quantity, $this->snackId, $this->bookingId];
    }
    
}