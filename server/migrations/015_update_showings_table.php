<?php
require("../connection/connection.php");

$query = "ALTER TABLE showings
          ADD COLUMN auditorium_id INT NOT NULL, 
          ADD CONSTRAINT fk_auditorium_id_showings 
          FOREIGN KEY (auditorium_id) REFERENCES auditoriums(auditorium_id) 
          ON DELETE CASCADE,
          
          ADD COLUMN movie_id INT NOT NULL, 
          ADD CONSTRAINT fk_movie_id_showings
          FOREIGN KEY (movie_id) REFERENCES movies(movie_id) 
          ON DELETE CASCADE";

$execute = $mysqli->prepare($query);

$execute->close();
$mysqli->close();
