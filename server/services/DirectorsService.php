<?php

    class DirectorsService {
        public static function articlesToArray($directors_db){

        $results = [];
        foreach($directors_db as $a){
            $results[] = $a->toArray();
        }
        return $results;
        }
    }