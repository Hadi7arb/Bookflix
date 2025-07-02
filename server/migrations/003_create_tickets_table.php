<?php
require("../connection/connection.php");

$query = "CREATE TABLE tickets(
    ticket_id INT(11) AUTO_INCREMENT primary key,
    seat_number VARCHAR(225) NOT NULL,
    price DECIMAL(10,2) NOT NULL
    )";

$execute = $mysqli->prepare($query);
if ($execute->execute()){
    echo "Table created successfully";
}
$execute->close();
$mysqli->close();

