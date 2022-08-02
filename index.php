<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/1298804a3b.js" crossorigin="anonymous"></script>
    <title>Allo Ciné</title>
</head>

<body>
  <?php

    session_start(); 
    // Pour pouvoir utiliser str_contains introduit dans PHP 8
    if (!function_exists('str_contains')) {
      function str_contains(string $haystack, string $needle): bool
      {
          return '' === $needle || false !== strpos($haystack, $needle);
      }
    }

    // Pour téléchargement des classes au lieu de multiples require
    function loadClass(string $class)
    {
        if ($class === "DotEnv") {
            require_once "./config/$class.php";
        } else if (str_contains($class, "Controller")) {
            require_once "./Controller/$class.php";
        } else {
            require_once "./Entity/$class.php";
        }
    }

    spl_autoload_register("loadClass");

    // require_once('./config/DotEnv.php'); 
    // require('./Entity/Movie.php');
    // require('./Entity/Category.php');
    // require('./Controller/MovieController.php');
    // require('./Controller/CategoryController.php');

  $movieController = new MovieController();
  $movies = $movieController->getAll(); 
  // echo '<pre>';
  // var_dump($movies);
  // echo '<br/>.<br/>'; 

  $categoryController = new CategoryController(); 
  //$categories = $categoryController->getAll(); 
  // var_dump($categories); 

    // $movie = new Movie(
    //   [
    //     "titre_film"=>"Avatar", 
    //     "description_film"=>"Un film avec des gens bleus", 
    //     "imageUrl_film"=>"https://fr.web.img6.acsta.net/medias/nmedia/18/78/...",
    //     "dateSortie_film"=>"2022-06-01", 
    //     "categorie_id"=>"2",
    //     "realisateur"=>"James Cameron"
    //   ]
    // );


  ?>

    <header>
        <!-- Barre de navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <div class="container-fluid">
              <span><img class="logo m-3" src="./img/logo.png" alt="logo Allo Ciné"><a class="navbar-brand" href="index.php">Allo Ciné</a></span>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 me-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="./views/create.php">Publier un film</a>
                  </li>
                </ul>

                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                  <li class="nav-item">
                    <a class="nav-link " href="./views/register.php">S'inscrire</a>
                  </li>

                  <li class="nav-item">
                    <?=  $_SESSION ? '<a class="nav-link " href="./views/logout.php">Se déconnecter</a>' : '<a class="nav-link " href="./views/login.php">Se connecter</a>' ?>
                  </li>

                </ul>
                <!-- <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
              </div>

            </div>
          </nav>
    </header>

    <main>

      <div class="title p-3">
        <h1>Allo Ciné</h1>
        <h3>Découvrez et partagez des films! </h3>
        <?= $_SESSION && $_SESSION["username_user"] ? " <span>Bienvenue {$_SESSION['username_user']}</span>" : "" ?>
      </div>

        <div class="p-3">
            <a class="button-css" href="./views/create.php">Publier un nouveau film</a>
        </div>

        <section class="container d-flex justify-content-center mt-4 ">

        <!-- film 1 Avatar -->
        <?php
        foreach($movies as $movie): 
        
          $category = $categoryController->get($movie->getCategorie_id());
          $dateSortie_film = new DateTime($movie->getDateSortie_film())
        ?> 
          
            
            <div class="card m-3" style="width: 18rem;">
              <img src="<?= $movie->getImageUrl_film() ?>" class="card-img-top" alt="affiche Avatar" style="height: 50vh">
              <div class="card-body">
                <h5 class="card-title"><?= $movie->getTitre_film(); ?></h5>
                <p class="card-subtitle mb-2 text-muted"><?= $dateSortie_film->format('d/m/Y') ?> </p>
                <p class="card-subtitle mb-2 text-muted"><?= $movie->getRealisateur() ?> </p>
                <h6 class="card-subtitle mb-2 text-muted"><?= $movie->getCategorie_id()?></h6>
                <p class="card-text" style="height: 20vh"><?= $movie->getDescription_film()?></p>
                
                <!-- Footer de la carte qui affiche la catégorie du film  -->
                <footer class="blockquote-footer" style="color:<?= $category->getCouleur_categorie() ?>"><?= $category->getNom_categorie() ?></footer>
               
                <div class="mt-2">
                  <a href="./views/update.php?id_film=<?= $movie->getId_film() ?>" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="modifier">
                    <img src="./img/edit.svg" alt="bouton modifier" style="width: 20px">
                  </a>
                  
                  <a href="./views/delete.php?id_film=<?= $movie->getId_film() ?>" class="btn btn-danger">
                    <img src="./img/trash.svg" alt="bouton supprimer" style="width: 20px" data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer">
                  </a>
                </div>
              </div>
            </div>
        
        <?php endforeach ?>

        </section>
    </main>
    
    <footer></footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>

  </body>
</html>