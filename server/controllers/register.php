<?php
require("../connection/connection.php");
require("../models/User.php");

header('Content-Type: application/json'); 

$response = [];
$response["status"] = 200;


$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (empty($data["name"]) || empty($data["email"]) || empty($data["password"]) || empty($data["mobile"]) || empty($data["age"])) {
    $response["message"] = "Missing required fields: name, email, password, mobile, age are required.";
    echo json_encode($response);
    exit;
}

$existingUser = User::findByEmail($mysqli, $data["email"]);
if ($existingUser) {
    $response["message"] = "Account with this email already exists";
    echo json_encode($response);
    exit;
}

$hashedPassword = password_hash($data["password"], PASSWORD_DEFAULT);

$userData = [
    "name" => $data["name"],
    "email" => $data["email"],
    "mobile" => $data["mobile"],
    "preference" => $data["preference"],
    "age" => $data["age"],
    "password" => $hashedPassword
];

    $AccountCreated = User::create($mysqli, $userData);

    if ($AccountCreated) {
        $response["message"] = "User registered successfully.";
    } else {
        $response["message"] = "Failed to register user. Database error.";
    }
 

echo json_encode($response);
exit;