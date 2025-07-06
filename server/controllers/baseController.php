<?php
require(__DIR__ . "/../services/ResponseService.php");
require(__DIR__. "/../connection/connection.php");

class BaseController {

    public $mysqli;

    protected function success($data){
        return ResponseService::success_response($data);
    }

    protected function error($data){
        return ResponseService::error_response($data);
    }

}