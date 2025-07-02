<?php
require("../connection/connection.php");

$query = "ALTER TABLE movies
          ADD COLUMN director_id INT NOT NULL, 
          ADD CONSTRAINT fk_movie_director
          FOREIGN KEY (director_id) REFERENCES directors(director_id) 
          ON DELETE RESTRICT";

$execute = $mysqli->prepare($query);

$execute->close();
$mysqli->close();
