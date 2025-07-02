<?php
require_once("model.php");

class User extends model{

private int $id;
private string $name;
private string $email;
private int $mobile;
private string $preference;
private int $age;
private string $password;

protected static string $table = "users";

public function __construct(array $data){
    $this->id = $data["id"];
    $this->name = $data["name"];
    $this->email = $data["email"];
    $this->mobile = $data["mobile"];
    $this->preference = $data["preference"];
    $this->age = $data["age"];
    $this->password = $data["password"];
}

public function getId(): int {
    return $this->id;
}

public function getName(): string {
    return $this->name;
}

public function getEmail(): string {
    return $this->email;
}

public function getMobile(): int {
    return $this->mobile;
}

public function getPreference(): string {
    return $this->preference;
}

public function getAge(): int {
    return $this->age;
}

public function getPass(): string {
    return $this->password;
}

public function setName(string $name){
    $this->name = $name;
}

public function setEmail(string $email){
    $this->email = $email;
}

public function setMobile(int $mobile){
    $this->mobile = $mobile;
}

public function setPreference(string $preference){
    $this->preference = $preference;
}

public function setAge(int $age){
    $this->age = $age;
}

public function setPass(string $password){
    $this->password = $password;
}

public function toArray(){
    return [$this->id, $this->name, $this->email, $this->mobile, $this->preference, $this->age, $this->password];
}

public static function findByEmail(mysqli $mysqli,  string $email){
    $sql = sprintf("SELECT * FROM %s WHERE email = ?", 
        static::$table);

    $query = $mysqli->prepare($sql);

    $query->bind_param("s", $email);
    $query->execute();

    $data = $query->get_result()->fetch_assoc();

    if ($data) {
        return new static($data);
    } else {
        return null;
    }
}

}
