<?php

require('./config/DotEnv.php'); 

class MovieController {

    private PDO $pdo; 

    public function __construct() {

        try {
            (new DotEnv(__DIR__ . '/../.env'))->load();
            $this->setPdo(new PDO(getenv('DATABASE_DNS'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD')));
        }
        catch(PDOException $error) {
            echo "<p style='color:red'>Error</p>";
        }
    }

    public function setPdo(PDO $pdo){
        $this->pdo = $pdo;
        return $this; 
    }

    // renvoie un tab de films
    public function getAll() {

        $movies = []; 
        $req = $this->pdo->query('SELECT * FROM `films`');
        $data = $req->fetchAll(); 

        foreach($data as $movie){
            $movies[] = new Movie($movie);
        }
        return $movies;
    }

    // renvoie un film 
    public function get(int $id_film){

    }

    // création d'un film 
    public function createMovie(Movie $newMovie): void{

    }

    // Modification d'un film 
    public function updateMovie(Movie $movie): void{

    }

    // Suppression d'un film 
    public function deleteMovie(Movie $movie): void{

    }

}