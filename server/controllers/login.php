<?php
require("../connection/connection.php");
require("../models/User.php");

session_start();

header('Content-Type: application/json');

$response = [];
$response["status"] = 200;

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (empty($data["email"]) || empty($data["password"])) {
    $response["message"] = "Missing required fields: email and password are required.";
    echo json_encode($response);
    exit;
}

$email = $data["email"];
$password = $data["password"];

$user = User::findByEmail($mysqli, $email);

if ($user) {
    
    if (password_verify($password, $user->getPass())) {
        
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_email'] = $user->getEmail();
        $_SESSION['user_name'] = $user->getName();

        $userDataForResponse = $user->toArray();
        unset($userDataForResponse['password']); 

        $response["message"] = "Login successful.";
        $response["user"] = $userDataForResponse;
    } else {
        $response["message"] = "Invalid credentials.";
    }
} 

echo json_encode($response);
exit;