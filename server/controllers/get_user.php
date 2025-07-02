<?php
require("../connection/connection.php");
require("../models/User.php");

$response = [];
$response["status"] = 200;

if(!isset($_GET["id"])){
    $users = Users::all($mysqli);

    $response["users"]= [];
    foreach($users as $a){
        $response["users"][] = $a->toArray();
    }
    echo json_encode($response);
    return;
}

$id = $_GET["id"];
$user = Users::find($mysqli, $id);
$response["users"] = $user->toArray();

echo json_encode($response);
return;