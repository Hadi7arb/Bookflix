<?php

    class DirectorsService {
        public static function directorsToArray($directors_db){

        $results = [];
        foreach($directors_db as $a){
            $results[] = $a->toArray();
        }
        return $results;
        }
    }