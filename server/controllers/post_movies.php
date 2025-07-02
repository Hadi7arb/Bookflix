<?php
require("../connection/connection.php");
require("../models/movies.php");


header('Access-Control-Allow-Origin: http://127.0.0.1:5500'); //
header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); //
header('Access-Control-Allow-Headers: Content-Type'); //
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit; 
}

$response = [];
$response["status"] = 200; 

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (empty($data["title"]) || empty($data["release_date"]) || empty($data["duration"]) || empty($data["age_restriction"]) || empty($data["director_id"]) || empty($data["imageURL"])) {
    $response["status"] = 400;
    $response["message"] = "Missing required fields. Please provide title, release date, duration, age restriction, director ID, and image URL.";
    echo json_encode($response);
    exit;
}

$movieData = [
    "title" => $data["title"],
    "release_date" => $data["release_date"],
    "duration" => (int)$data["duration"],
    "age_restriction" => $data["age_restriction"],
    "director_id" => (int)$data["director_id"],
    "imageURL" => $data["imageURL"]
];

$creationSuccess = movies::create($mysqli, $movieData);

if ($creationSuccess) {
    $response["message"] = "Movie added successfully!";
} else {
    $response["status"] = 500; 
    $response["message"] = "Failed to add movie to the database. This could be due to a foreign key constraint (e.g., director ID does not exist), or another database error.";
   
}

echo json_encode($response);
exit;