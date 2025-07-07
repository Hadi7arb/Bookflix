<?php

    class UsersService {
        public static function articlesToArray($users_db){

        $results = [];
        foreach($users_db as $a){
            $results[] = $a->toArray();
        }
        return $results;
        }
    }