<?php
require("../connection/connection.php");

$query = "CREATE TABLE movies(
    movie_id INT(11) AUTO_INCREMENT primary key,
    title VARCHAR(255) NOT NULL,
    release_date DATE,
    duration INT,
    age_restriction VARCHAR(255) NOT NULL
    )";

$execute = $mysqli->prepare($query);
if ($execute->execute()){
    echo "Table created successfully";
}
$execute->close();
$mysqli->close();