<?php

    class SeatsService {
        public static function seatsToArray($seats_db){

        $results = [];
        foreach($seats as $a){
            $results[] = $a->toArray();
        }
        return $results;
        }
    }