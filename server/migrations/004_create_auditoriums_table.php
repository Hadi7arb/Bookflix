<?php
require("../connection/connection.php");

$query = "CREATE TABLE auditoriums(
    auditorium_id INT(11) AUTO_INCREMENT primary key,
    auditorium_nb VARCHAR(255) NOT NULL UNIQUE,
    capacity INT NOT NULL,
    screen_size VARCHAR(255) NOT NULL
    )";

$execute = $mysqli->prepare($query);
if ($execute->execute()){
    echo "Table created successfully";
}
$execute->close();
$mysqli->close();