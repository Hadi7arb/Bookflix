<?php

    class UsersService {
        public static function userToArray($users_db){

        $results = [];
        foreach($users_db as $a){
            $results[] = $a->toArray();
        }
        return $results;
        }
    }