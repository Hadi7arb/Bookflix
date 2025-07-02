<?php
require("../connection/connection.php");
require("../models/showings.php");
require("../models/movies.php");

header('Content-Type: application/json');

$response = [];
$response["status"] = 200;

if (isset($_GET["movie_id"])) {
    $movieId = $_GET["movie_id"];

    $showings = showings::findByMovieId($mysqli, (int)$movieId);
    if (empty($showings)) {
        $response["message"] = "No showings found for this movie.";
        echo json_encode($response);
        exit;
    }

    $response["showings"] = [];
    foreach ($showings as $showing) {
        $response["showings"][] = $showing->toArray();
    }
} else {
   
    $showings = showings::all($mysqli);

    if (empty($showings)) {
        $response["message"] = "No showings available.";
        echo json_encode($response);
        exit;
    }

    $response["showings"] = [];
    foreach ($showings as $showing) {
        $response["showings"][] = $showing->toArray();
    }
}

echo json_encode($response);
exit;