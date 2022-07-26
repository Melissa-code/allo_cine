<?php

// require_once('./config/DotEnv.php'); 

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
        $req = $this->pdo->prepare('SELECT * FROM films WHERE id_film = :id_film');
        $req->bindParam(":id_film", $id_film, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch(); 
        $movie = new Movie($data); 

        return $movie;
    }

    // création d'un film 
    public function create(Movie $newMovie): void{
        $req =$this->pdo->prepare('INSERT INTO films (titre_film, description_film, imageUrl_film, dateSortie_film, categorie_id, realisateur) VALUES (:titre_film, :description_film, :imageUrl_film, :dateSortie_film, :categorie_id, :realisateur)');
        $req->bindValue(":titre_film", $newMovie->getTitre_film(), PDO::PARAM_STR);
        $req->bindValue(":description_film", $newMovie->getDescription_film(), PDO::PARAM_STR);
        $req->bindValue(":imageUrl_film", $newMovie->getImageUrl_film(), PDO::PARAM_STR);
        $req->bindValue(":dateSortie_film", $newMovie->getDateSortie_film(), PDO::PARAM_STR);
        $req->bindValue(":categorie_id", $newMovie->getCategorie_id(), PDO::PARAM_INT);
        $req->bindValue(":realisateur", $newMovie->getRealisateur(), PDO::PARAM_STR);
        $req->execute();
    }

    // Modification d'un film 
    public function update(Movie $movie): void{
        $req =$this->pdo->prepare('UPDATE films SET titre_film = :titre_film, description_film = :description_film, imageUrl_film = :imageUrl_film, dateSortie_film = :dateSortie_film, categorie_id = :categorie_id, realisateur = :realisateur WHERE id_film = :id_film');
        $req->bindValue(":titre_film", $movie->getTitre_film(), PDO::PARAM_STR);
        $req->bindValue(":description_film", $movie->getDescription_film(), PDO::PARAM_STR);
        $req->bindValue(":imageUrl_film", $movie->getImageUrl_film(), PDO::PARAM_STR);
        $req->bindValue(":dateSortie_film", $movie->getDateSortie_film(), PDO::PARAM_STR);
        $req->bindValue(":categorie_id", $movie->getCategorie_id(), PDO::PARAM_INT);
        $req->bindValue(":realisateur", $movie->getRealisateur(), PDO::PARAM_STR);
        $req->bindValue(":id_film", $movie->getId_film(), PDO::PARAM_INT);
        $req->execute();
    }

    // Suppression d'un film 
    public function delete(int $id_film) {
        $req = $this->pdo->prepare('DELETE FROM films WHERE id_film = :id_film'); 
        $req->bindParam(':id_film', $id_film, PDO::PARAM_INT); 
        $req->execute();
    }
    

}