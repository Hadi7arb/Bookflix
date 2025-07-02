<?php
require("../connection/connection.php");

$query="ALTER TABLE users
ADD password VARCHAR(255) NOT NULL";

$execute = $mysqli->prepare($query);
$execute->execute();