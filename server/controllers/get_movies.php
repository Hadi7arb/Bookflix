<?php
require("../connection/connection.php");
require("../models/movies.php");

header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type'); 
header('Content-Type: application/json');


$response = [];
$response["status"] = 200;

if(!isset($_GET["id"])){
    $movies = movies::all($mysqli);

    $response["movies"]= [];
    foreach($movies as $movie){
        $response["movies"][] = $movie->toArray();
    }
    echo json_encode($response);
    return;
}

$id = $_GET["id"];
$movie = movies::find($mysqli, $id);
$response["movies"] = $movie->toArray();

echo json_encode($response);
return;