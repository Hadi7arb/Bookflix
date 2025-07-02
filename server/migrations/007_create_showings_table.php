<?php
require("../connection/connection.php");

$query = "CREATE TABLE showings(
    showing_id INT(11) AUTO_INCREMENT primary key,
    time DATETIME NOT NULL
    )";

$execute = $mysqli->prepare($query);
if ($execute->execute()){
    echo "Table created successfully";
}
$execute->close();
$mysqli->close();

