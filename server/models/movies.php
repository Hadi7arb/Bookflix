<?php
require_once("model.php");


class movies extends model{

    private  ?int $id; 
    private string $title;
    private string $releaseDate;
    private int $duration;
    private string $ageRestriction;
    private int $directorId;
    private string $imageURL;

protected static string $table = "movies";
// protected static string $primary_key="id";


public function __construct(array $data){
    $this->movieId = $data["movie_id"];
    $this->title = $data["title"];
    $this->releaseDate = $data["release_date"];
    $this->duration = $data["duration"];
    $this->ageRestriction = $data["age_restriction"];
    $this->directorId = $data["director_id"];
    $this->imageURL = $data["imageURL"];
}

// public function getId(): int {
//     return $this->movieId;
// }

// public function getTitle(): string {
//     return $this->title;
// }

// public function getReleaseDate(): string {
//     return $this->releaseDate;
// }

// public function getDuration(): int {
//     return $this->duration;
// }

// public function getAgeRestriction(): string {
//     return $this->ageRestriction;
// }

// public function getDirectorId(): int {
//     return $this->directorId;
// }
// public function getImageURL(): string {
//     return $this->imageURL;
// }

// public function setTitle(string $title){
//     $this->title = $title;
// }

// public function setReleaseDate(string $releaseDate){
//     $this->releaseDate = $releaseDate;
// }

// public function setDuration(int $duration){
//     $this->duration = $duration;
// }

// public function setAgeRestriction(string $ageRestriction){
//     $this->ageRestriction = $ageRestriction;
// }

// public function setDirectorId(int $directorId){
//     $this->directorId = $directorId;
// }

// public function setImageURL(string $imageURL){
//     $this->imageURL = $imageURL;
// }

public function toArray(): array {
    return [
        "id" => $this->id,
        "title" => $this->title,
        "release_date" => $this->releaseDate, 
        "duration" => $this->duration,
        "age_restriction" => $this->ageRestriction, 
        "director_id" => $this->directorId, 
        "imageURL" => $this->imageURL 
    ];
}

}