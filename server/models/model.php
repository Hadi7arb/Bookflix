<?php

abstract class model{

 protected static string $table;
protected static string $primary_key="id";

public static function find(mysqli $mysqli, int $id){
    $sql = sprintf("select * from %s WHERE %s = ?", 
        static :: $table, 
        static :: $primary_key);

        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
}   

public static function all(mysqli $mysqli){
    $sql = sprintf("select * from %s",
        static :: $table);

        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result();

        $objects=[];
        while ($row->fetch_assoc()){
            $objects[] = new static($row);
        }
return $objects;

}

public static function create(mysqli $mysqli, array $data){
    $keys = implode(', ', array_keys($data));
    $placeholders = implode(', ', array_fill(0, count($data), '?'));
    $values = array_values($data);

    $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)",
        static::$table,
        $keys,
        $placeholders
    );
    $query = $mysqli->prepare($sql);

    $types = str_repeat('s', count($values));
    $query->bind_param($types, ...$values);

    return $query->execute();
}


}

    

