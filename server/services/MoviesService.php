<?php

    class MovieService {
        public static function moviesToArray($movies_db){

        $results = [];
        foreach($movies_db as $a){
            $results[] = $a->toArray();
        }
        return $results;
        }
    }