<?php
require("../connection/connection.php");

$query = "ALTER TABLE tickets
          ADD COLUMN booking_id INT NOT NULL,
          ADD CONSTRAINT fk_booking_id
          FOREIGN KEY (booking_id) REFERENCES bookings(booking_id)
          ON DELETE CASCADE";

$execute = $mysqli->prepare($query);

$execute->close();
$mysqli->close();
