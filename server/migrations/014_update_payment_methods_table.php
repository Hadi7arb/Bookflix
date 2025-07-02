<?php
require("../connection/connection.php");

$query = "ALTER TABLE payment_methods
          ADD COLUMN user_id INT NOT NULL,
          ADD CONSTRAINT fk_payment_methods_user 
          FOREIGN KEY (user_id) REFERENCES users(id) 
          ON DELETE CASCADE";

$execute = $mysqli->prepare($query);

$execute->close();
$mysqli->close();
