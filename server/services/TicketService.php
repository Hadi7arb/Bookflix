<?php

    class TicketsService {
        public static function ticketToArray($tickets_db){

        $results = [];
        foreach($tickets as $a){
            $results[] = $a->toArray();
        }
        return $results;
        }
    }