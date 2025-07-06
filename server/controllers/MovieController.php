<?php
    require(__DIR__ . "/../models/movies.php");
    require(__DIR__ . "/../connection/connection.php");
    require(__DIR__ . "/../services/MoviesService.php");
    require(__DIR__ . "/../controllers/baseController.php");


    class MovieController extends baseController{
        
        public function getAllMovies(){
            global $mysqli;
            try{
                if(!isset($_GET["id"])){
                    $movies = movies::all($mysqli);
                    $movies_array = MoviesService::moviesToArray($movies);
                    echo $this->success($movies_array);
                    return;
                }

                $id = $_GET["id"];
                $movie = movies::find($mysqli, $id)->toArray();
                if(!$movie){
                    echo $this->error("Movie not found");
                    return;
                }else{
                    echo $this->success($movie);
                    return;
                }
            }catch (Exception $e){
                echo $this->error("server error: " . $e->getMessage(), 500);
            }
        }

        public function AddMovie(){
            global $mysqli;
            try{
                if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
                    echo $this->error("Invalid request method", 405);
                    return;
                }
                $data = json_decode(file_get_contents("php://input"), true);

                if (!isset($data['title']) || !isset($data['release_date']) || !isset($data['duration']) || !isset($data['age_restriction']) || !isset($data['director_id']) || !isset($data['imageURL'])){
                    echo $this->error("Missing required fields", 400);
                }
                    $movieId = movies::create($mysqli,[ 
                        'title' => $data['title'],
                        'release_date' => $data['release_date'],
                        'duration' => $data['duration'],
                        'age_restriction' => $data['age_restriction'],
                        'director_id' => $data['director_id'],
                        'imageURL' => $data['imageURL']    
                    ]);

                echo $this->success([
                    "message" => "Movie added successfully",
                    "movie_id" => $movieId
                ]);
            }catch (Exception $e){
                echo $this->error("Server error: " . $e->getMessage(), 500);
            }
        
        }
    }