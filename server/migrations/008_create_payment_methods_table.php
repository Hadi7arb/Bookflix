<?php
require("../connection/connection.php");

$query = "CREATE TABLE payment_methods(
    payment_method_id INT(11) AUTO_INCREMENT primary key,
    method_name VARCHAR(255) NOT NULL,
    expiry_date DATE NOT NULL,
    card_nb VARCHAR(4) NOT NULL
    )";

$execute = $mysqli->prepare($query);
if ($execute->execute()){
    echo "Table created successfully";
}
$execute->close();
$mysqli->close();

