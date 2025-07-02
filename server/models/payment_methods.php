<?php
require_once("Model.php");

class payment_methods extends Model{

    private int $id; 
    private string $methodName; 
    private string $expiryDate; 
    private string $cardNb; 
    private int $userId;


    protected static string $table = "payment_methods";

    public function __construct(array $data){
        $this->id = $data["payment_method_id"];
        $this->methodName = $data["method_name"];
        $this->expiryDate = $data["expiry_date"];
        $this->cardNb = $data["card_nb"];
        $this->userId = $data["user_id"];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getMethodName(): string {
        return $this->methodName;
    }

    public function getExpiryDate(): string {
        return $this->expiryDate;
    }

    public function getCardNb(): string {
        return $this->cardNb;
    }

    public function getUserId(): int {
        return $this->userId;
    }

    public function setMethodName(string $methodName){
        $this->methodName = $methodName;
    }

    public function setExpiryDate(string $expiryDate){
        $this->expiryDate = $expiryDate;
    }

    public function setCardNb(string $cardNb){
        $this->cardNb = $cardNb;
    }

    public function setUserId(int $userId){
        $this->userId = $userId;
    }

    public function toArray(){
        return [$this->id, $this->methodName, $this->expiryDate, $this->cardNb, $this->userId];
    }
    
}