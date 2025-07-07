<?php
require("../connection/connection.php");
require("../models/directors.php"); 

header('Content-Type: application/json');


class DirectorsCOntroller extends baseController{

public function AddDirector(){
    global $mysqli;
    try{

    
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
echo json_encode($response);
exit;
}catch(Exception $e){
    echo $this->error("server error: " . $e->getMessage(), 500);
}


}
}
