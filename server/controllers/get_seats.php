<?php
require("../connection/connection.php");
require("../models/seats.php");

$response = [];
$response["status"] = 200;

if(!isset($_GET["id"])){
    $seats = seats::all($mysqli);

    $response["seats"]= [];
    foreach($movies as $seats){
        $response["seats"][] = $seats->toArray();
    }
    echo json_encode($response);
    return;
}

$id = $_GET["id"];
$seat = seats::find($mysqli, $id);
$response["seats"] = $seat->toArray();

echo json_encode($response);
return;