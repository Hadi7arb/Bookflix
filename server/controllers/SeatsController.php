<?php
require("../connection/connection.php");
require("../models/seats.php");
require("../controllers/baseController.php");

class SeatsController extends baseController{
    public function getAllSeats(){
            global $mysqli;
            try{
                if(!isset($_GET["id"])){
                    $seats = seats::all($mysqli);
                    $movies_array = SeatsService::seatsToArray($seats);
                    echo $this->success($seats_array);
                    return;
                }

                $id = $_GET["id"];
                $seat = seats::find($mysqli, $id)->toArray();
                if(!$seat){
                    echo $this->error("seat not found");
                    return;
                }else{
                    echo $this->success($seat);
                    return;
                }
            }catch (Exception $e){
                echo $this->error("server error: " . $e->getMessage(), 500);
            }
        }
}