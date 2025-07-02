<?php
require("../connection/connection.php");
require("../models/movies.php");

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