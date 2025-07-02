<?php
require("../connection/connection.php");

$query="ALTER TABLE movies
ADD imageURL VARCHAR(255) NOT NULL";

$execute = $mysqli->prepare($query);
$execute->execute();