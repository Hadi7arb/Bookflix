<?php
require_once("Model.php");

class snacks extends Model{

    private int $snackId; 
    private float $price; 
    private string $name; 
    
    
    protected static string $table = "snacks";

    public function __construct(array $data){
        $this->snackId = $data["snack_id"];
        $this->price = $data["snack_price"];
        $this->name = $data["snack_name"];
    }

    public function getSnackId(): int {
        return $this->snackId;
    }

    public function getSnackPrice(): float {
        return $this->price;
    }

    public function getSnackName(): string {
        return $this->name;
    }

    public function setSnackPrice(float $price){
        $this->price = $price;
    }

    public function setSnackName(string $name){
        $this->name = $name;
    }

    public function toArray(){
        return [$this->snackId, $this->price, $this->name];
    }
    
}