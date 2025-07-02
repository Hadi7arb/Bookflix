<?php
require("../connection/connection.php");
require("../models/directors.php"); // Ensure this matches your model filename (Director.php)

header('Content-Type: application/json');

$response = ["status" => 200, "message" => ""];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response["status"] = 405;
    $response["message"] = "Method Not Allowed. Only POST requests are supported.";
    echo json_encode($response);
    exit;
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (empty($data["director_name"])) {
    $response["status"] = 400;
    $response["message"] = "Missing required field: director_name is required.";
    echo json_encode($response);
    exit;
}

$directorData = [
    "director_name" => $data["director_name"]
];

try {
    $creationSuccess = directors::create($mysqli, $directorData);

    if ($creationSuccess) {
        $response["message"] = "Director added successfully.";
        $response["director_id"] = $mysqli->insert_id;
    } else {
        $response["status"] = 500;
        $response["message"] = "Failed to add director. Database error.";
        error_log("Failed to create director in DB: " . $mysqli->error);
    }
} catch (Exception $e) {
    $response["status"] = 500;
    $response["message"] = "An error occurred: " . $e->getMessage();
    error_log("Director creation error: " . $e->getMessage());
}

echo json_encode($response);
exit;