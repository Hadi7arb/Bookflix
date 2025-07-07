<?php
require("../connection/connection.php");
require("../models/showings.php");
require("../models/model.php");
require("../controllers/baseController");

header('Content-Type: application/json');

class ShowingsController extends baseController{


public function getShowings(){

if (isset($_GET["movie_id"])) {
    $showingId = $_GET["movie_id"];

    $showings = showings::findByMovieId($mysqli, (int)$showingId);
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
    
}

}