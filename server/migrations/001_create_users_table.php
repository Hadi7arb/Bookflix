<?php
require("../connection/connection.php");

$query = "CREATE TABLE users(
    id INT(11) AUTO_INCREMENT primary key,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mobile INT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    preference VARCHAR(225) NULL,
    age INT NOT NULL
    )";

$execute = $mysqli->prepare($query);
if ($execute->execute()){
    echo "Table created successfully";
}
$execute->close();
$mysqli->close();