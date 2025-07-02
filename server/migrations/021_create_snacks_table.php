<?php
require("../connection/connection.php");

$query = "CREATE TABLE snacks(
    snack_id INT(11) AUTO_INCREMENT primary key,
    snack_price DECIMAL(10,2),
    snack_name VARCHAR(255) NOT NULL
    )";

$execute = $mysqli->prepare($query);
if ($execute->execute()){
    echo "Table created successfully";
}
$execute->close();
$mysqli->close();