<?php

//require_once('../config/DotEnv.php'); 

class UserController {

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


    // renvoie un tab d'objets Users
    public function getAll(): array {
        $users = []; 
        $req = $this->pdo->query("SELECT * FROM users");
        $data = $req->fetchAll(); 
        foreach($data as $user){
            $users[] = new User($user);
        }
        return $users;
    }

    // renvoie un objet User
    public function get(int $id_user): User {
        $req = $this->pdo->prepare('SELECT * FROM users WHERE id_user = :id_user');
        $req->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch(); 
        $user = new User($data); 
        return $user;
    }

    // création d'un User
    public function create(User $newUser): void{
        $req =$this->pdo->prepare('INSERT INTO users (username_user, email_user, password_user) VALUES (:username_user, :email_user, :password_user)');
        $req->bindValue(":username_user", $newUser->getUsername_user(), PDO::PARAM_STR);
        $req->bindValue(":email_user", $newUser->getEmail_user(), PDO::PARAM_STR);
        $req->bindValue(":password_user", $newUser->getPassword_user(), PDO::PARAM_STR);
   
        $req->execute();
    }

    // Modification 
    public function update(User $user): void{

    }

    // Suppression
    public function delete(User $user): void{

    }

}