<?php
require("../connection/connection.php");

$query = "CREATE TABLE booking_snacks(
    quantity INT NOT NULL,
    snack_id INT NOT NULL,
    booking_id INT NOT NULL,
    PRIMARY KEY(snack_id, booking_id),
    CONSTRAINT fk_booking_snacks_snack
    FOREIGN KEY (snack_id) REFERENCES snacks(snack_id)
    ON DELETE CASCADE,
    CONSTRAINT fk_booking_snacks_booking
    FOREIGN KEY (booking_id) REFERENCES bookings(booking_id)
    ON DELETE RESTRICT
    )";

$execute = $mysqli->prepare($query);
if ($execute->execute()){
    echo "Table created successfully";
}
$execute->close();
$mysqli->close();