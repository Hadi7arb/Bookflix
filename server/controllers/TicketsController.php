<?php
require("../connection/connection.php");
require("../models/Ticket.php");
require("../models/model.php");
require("../controllers/baseController");



class TicketController extends baseController{
    public function getTickets(){

if (isset($_GET["movie_id"])) {
    $ticketId = $_GET["movie_id"];

    $tickets = tickets::findByTicketId($mysqli, (int)$ticketId);
    if (empty($tickets)) {
        $response["message"] = "Invalid ticket Id";
        echo json_encode($response);
        exit;
    }

    $response["tickets"] = [];
    foreach ($tickets as $ticket) {
        $response["tickets"][] = $ticket->toArray();
    }
} else {
   
    $tickts = tickets::all($mysqli);

    if (empty($tickets)) {
        $response["message"] = "No tickets available";
        echo json_encode($response);
        exit;
    }

    $response["tickets"] = [];
    foreach ($tickets as $ticket) {
        $response["tickets"][] = $ticket->toArray();
    }
}

echo json_encode($response);
exit;
    
}
}