<?php
require("../connection/connection.php");

$query = "ALTER TABLE seats
          ADD COLUMN auditorium_id INT NOT NULL, 
          ADD CONSTRAINT fk_auditorium_id 
          FOREIGN KEY (auditorium_id) REFERENCES auditoriums(auditorium_id) 
          ON DELETE CASCADE";

$execute = $mysqli->prepare($query);

$execute->close();
$mysqli->close();
