<?php

require_once('./config/DotEnv.php'); 

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


    // renvoie un tab de films
    public function getAll(): array {

        $categories = []; 
        $req = $this->pdo->query("SELECT * FROM categorie");
        $data = $req->fetchAll(); 

        foreach($data as $category){
            $categories[] = new Category($category);
        }
        return $categories;
    }

    // renvoie un film 
    public function get(int $id_categorie): Category{
        $req = $this->pdo->prepare('SELECT * FROM categorie WHERE id_categorie = :id_categorie');
        $req->bindParam(":id_categorie", $id_categorie, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch(); 
        $category = new Category($data); 
        return $category;
       
    }

    // création d'un film 
    public function createCategory(Category $newCategory): void{

    }

    // Modification d'un film 
    public function updateCategory(Category $Category): void{

    }

    // Suppression d'un film 
    public function deleteCategory(Category $Category): void{

    }

}