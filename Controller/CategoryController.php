<?php

//require_once('../config/DotEnv.php'); 

class CategoryController {

    private PDO $pdo; 

    public function __construct() {

        try {
            (new DotEnv(__DIR__ . '/../.env'))->load(); // chargement des variables d'environnement du .env
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


    // renvoie un tab d'objets categories
    public function getAll(): array {

        $categories = []; 
        $req = $this->pdo->query("SELECT * FROM categorie");
        $data = $req->fetchAll(); 

        foreach($data as $category){
            $categories[] = new Category($category);
        }
        return $categories;
    }

    // renvoie un objet catégorie 
    public function get(int $id_categorie): Category {

        $req = $this->pdo->prepare('SELECT * FROM categorie WHERE id_categorie = :id_categorie');
        $req->bindParam(":id_categorie", $id_categorie, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch(); 
        $category = new Category($data); 

        return $category;
    }

    // création 
    public function create(Category $newCategory): void{

        $req =$this->pdo->prepare('INSERT INTO categorie (nom_categorie, couleur_categorie) VALUES (:nom_categorie, :couleur_categorie)');
        $req->bindParam(":nom_categorie", $newCategory->getNom_categorie(), PDO::PARAM_STR);
        $req->bindParam(":couleur_categorie", $newCategory->getCouleur_categorie(), PDO::PARAM_STR);
        $req->execute();
    }

    // Modification 
    public function update(Category $Category): void{

    }

    // Suppression
    public function delete(Category $Category): void{

    }

}