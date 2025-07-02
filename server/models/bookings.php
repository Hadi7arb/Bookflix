<?php
require_once("model.php");


class User extends model{

private int $bookingId;
private string $time;
private int $capacity;
private string $screenSize;
private float $totalPrice;
private int $userId;
private int $showingId;
private int $paymentMethodId;

protected static string $table = "bookings";

public function __construct(array $data){
    $this->bookingId = $data["booking_id"];
    $this->time = $data["time"];
    $this->capacity = $data["capacity"];
    $this->screenSize = $data["screen_size"];
    $this->totalPrice = $data["total_price"];
    $this->userId = $data["user_id"];
    $this->showingId = $data["showing_id"];
    $this->paymentMethodId = $data["payment_method_id"];
}

public function getBookingID(): int {
    return $this->bookingId;
}

public function getTime(): string {
    return $this->time;
}

public function getCapacity(): int {
    return $this->capacity;
}

public function getScreenSize(): string {
    return $this->screenSize;
}

public function getTotalPrice(): float {
    return $this->totalPrice;
}

public function getUserId(): int {
    return $this->userId;
}

public function getShowingId(): int {
    return $this->showingId;
}

public function getPaymentMethodId(): int {
    return $this->paymentMethodId;
}

public function setTime(string $time){
    $this->time = $time;
}

public function setCapacity(string $capacity){
    $this->capacity = $capacity;
}

public function setScreenSize(string $screenSize){
    $this->screenSize = $screenSize;
}

public function setTotalPrice(string $totalPrice){
    $this->totalPrice = $totalPrice;
}

public function setUserId(int $userId){
    $this->userId = $userId;
}

public function setShowingId(int $showingId){
    $this->ShowingId = $showingId;
}

public function setPaymentMethodId(int $paymentMethodId){
    $this->paymentMethodId = $paymentMethodId;
}

public function toArray(){
    return [$this->bookingId, $this->time, $this->capacity, $this->screenSize, 
    $this->totalPrice, $this->userId, $this->showingId, $this->paymentMethodId];
}

}