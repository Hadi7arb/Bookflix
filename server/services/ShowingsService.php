<?php

    class ShowingsService {
        public static function showingToArray($showings_db){

        $results = [];
        foreach($showings as $a){
            $results[] = $a->toArray();
        }
        return $results;
        }
    }