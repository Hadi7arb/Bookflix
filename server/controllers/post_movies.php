
<?php
require("../connection/connection.php");
require("../models/movies.php");

header('Content-Type: application/json'); 

$response = [];
$response["status"] = 200;

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (empty($data["title"]) || empty($data["release_date"]) || empty($data["duration"]) || empty($data["age_restriction"]) || empty($data["director_id"]) || empty($data["imageURL"])) {
    $response["message"] = "Missing required fields";
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

echo json_encode($response);
exit;
