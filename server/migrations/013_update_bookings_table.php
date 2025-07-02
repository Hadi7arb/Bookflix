<?php
require("../connection/connection.php");

$query = "ALTER TABLE bookings
          ADD COLUMN user_id INT NOT NULL, 
          ADD CONSTRAINT fk_user_id_bookings 
          FOREIGN KEY (user_id) REFERENCES users(id) 
          ON DELETE CASCADE,
          
          ADD COLUMN showing_id INT NOT NULL, 
          ADD CONSTRAINT fk_showing_id_bookings
          FOREIGN KEY (showing_id) REFERENCES showings(showing_id) 
          ON DELETE CASCADE,
          
          ADD COLUMN payment_method_id INT NOT NULL, 
          ADD CONSTRAINT fk_payment_method_id_bookings 
          FOREIGN KEY (payment_method_id) REFERENCES payment_methods(payment_method_id) 
          ON DELETE CASCADE";

$execute = $mysqli->prepare($query);

$execute->close();
$mysqli->close();
