<?php
require("../connection/connection.php");

$query = "CREATE TABLE actors(
    actor_id INT(11) AUTO_INCREMENT primary key,
    name VARCHAR(255) NOT NULL
    )";

$execute = $mysqli->prepare($query);
if ($execute->execute()){
    echo "Table created successfully";
}
$execute->close();
$mysqli->close();