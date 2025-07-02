<?php
require("../connection/connection.php");

$query = "CREATE TABLE seats(
    seats_id INT(11) AUTO_INCREMENT primary key,
    seat_nb VARCHAR(255) NOT NULL UNIQUE,
    seat_row VARCHAR(255) NOT NULL,
    seat_column VARCHAR(255) NOT NULL
    )";

$execute = $mysqli->prepare($query);
if ($execute->execute()){
    echo "Table created successfully";
}
$execute->close();
$mysqli->close();

