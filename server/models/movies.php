<?php
require_once("model.php");


class movies extends model{

private int $id;
private string $title;
private string $releaseDate;
private int $duration;
private string $ageRestriction;
private int $directorId;
private string $imageURL;

protected static string $table = "movies";

public function __construct(array $data){
    $this->id = $data["movie_id"];
    $this->title = $data["title"];
    $this->releaseDate = $data["release_date"];
    $this->duration = $data["duration"];
    $this->ageRestriction = $data["age_restriction"];
    $this->directorId = $data["director_id"];
    $this->imageURL = $data["imageURL"];
}

public function getId(): int {
    return $this->id;
}

public function getTitle(): string {
    return $this->title;
}

public function getReleaseDate(): string {
    return $this->releaseDate;
}

public function getDuration(): int {
    return $this->duration;
}

public function getAgeRestriction(): string {
    return $this->ageRestriction;
}

public function getDirectorId(): int {
    return $this->directorId;
}
public function getImageURL(): string {
    return $this->imageURL;
}

public function setTitle(string $title){
    $this->title = $title;
}

public function setReleaseDate(string $releaseDate){
    $this->releaseDate = $releaseDate;
}

public function setDuration(int $duration){
    $this->duration = $duration;
}

public function setAgeRestriction(string $ageRestriction){
    $this->ageRestriction = $ageRestriction;
}

public function setDirectorId(int $directorId){
    $this->directorId = $directorId;
}

public function setImageURL(string $imageURL){
    $this->imageURL = $imageURL;
}

public function toArray(){
    return [$this->id, $this->title, $this->releaseDate, $this->duration, $this->ageRestriction, $this->directorId, $this->imageURL];
}

}