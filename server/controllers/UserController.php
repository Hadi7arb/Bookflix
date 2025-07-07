<?php
require(__DIR__ . "/../models/User.php");
require(__DIR__. "/../connection/connection.php");
require(__DIR__ ."/../services/UsersService.php");
require(__DIR__ . "/../controllers/baseController.php");

class UserController extends BaseController{

        public function createUser(){
             global $mysqli;
            try{
                if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
                    echo $this->error("Invalid request method", 405);
                    return;
                }
                $data = json_decode(file_get_contents("php://input"), true);

                if (!isset($data['name']) || !isset($data['email']) || !isset($data['mobile']) || !isset($data['preference']) || !isset($data['age']) || !isset($data['password'])){
                    echo $this->error("Missing required fields", 400);
                    return;
                }
                    $userId = User::create($mysqli,[ 
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'mobile' => $data['mobile'],
                        'preference' => $data['preference'],
                        'age' => $data['age'],
                        'password' => password_hash($data['password'], PASSWORD_BCRYPT)
  
                    ]);

                echo $this->success([
                    "message" => "Successfully regestered",
                    "id" => $userId
                ]);
            }catch (Exception $e){
                echo $this->error("Server error: " . $e->getMessage(), 500);
            }
        
        }

        public function userLogin(){
            global $mysqli;
            try{
                if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
                   echo $this->error("Invalid request method", 405);
                   return; 
                }
                $data = json_decode(file_get_contents("php://input"), true);

                if (!isset($data['email']) || !isset($data['password'])){
                    echo $this->error("Missing required fields", 400);
                    return;
                }

                $user = User::findByEmail($mysqli, $data['email']);

                if (!$user || !password_verify($data['password'], $user->getPass())) {
                        echo $this->error("Invalid email or password", 401);
                        return;
}

                echo $this->success([
                    "message" => "Login successful",
                    "user" => $user->toArray()
                ]);

            }catch(Exception $e){
                echo $this->error("Server error: " . $e->getMessage(), 500);{

            }

        }
        }
    }
