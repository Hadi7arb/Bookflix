<?php
require("../connection/connection.php");

$query = "CREATE TABLE bookings(
    booking_id INT(11) AUTO_INCREMENT primary key,
    time DATETIME NOT NULL,
    capacity INT NOT NULL,
    screen_size VARCHAR(255) NOT NULL,
    total_price DECIMAL(10,2) NOT NULL
    )";

$execute = $mysqli->prepare($query);
if ($execute->execute()){
    echo "Table created successfully";
}
$execute->close();
$mysqli->close();

