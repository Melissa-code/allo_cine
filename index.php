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
    require('./Entity/Movie.php');
    require('./Controller/MovieController.php');

  $movieController = new MovieController(); 
  $movies = $movieController->getAll(); 
  var_dump($movies); 


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
              <span><img class="logo m-3" src="./img/logo.png" alt="logo Allo Ciné"><a class="navbar-brand" href="index.html">Allo Ciné</a></span>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="./views/create.html">Publier un film</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                  </li>
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>

    </header>

    <main>

    <?php

    ?>
        <h1>Allo Ciné</h1>
        <h3>Découvrez et partagez des films! </h3>
        
        <div>
            <a class="button-css" href="./views/create.html">Publier un nouveau film</a>
        </div>

        <section class="container d-flex justify-content-center mt-4 ">

        <!-- film 1 Avatar -->
        <?php
        foreach($movies as $movie): ?> 
          
            <div class="card m-3" style="width: 18rem;">
              <img src="https://fr.web.img6.acsta.net/medias/nmedia/18/78/95/70/19485155.jpg" class="card-img-top" alt="affiche Avatar">
              <div class="card-body">
                <h5 class="card-title"><?= $movie->getTitre_film(); ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $movie->getCategorie_id()?></h6>
                <div class="card-text"><?= $movie->getDescription_film()?></div>

                <div class="mt-2">
                  <button type="button" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="modifier">
                    <img src="./img/edit.svg" alt="bouton modifier" style="width: 20px">
                  </button>
                  
                  <a href="#" class="btn btn-danger">
                    <img src="./img/trash.svg" alt="bouton supprimer" style="width: 20px" data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer">
                  </a>
                </div>
              </div>
            </div>
        
        <?php endforeach ?>


<!-- 
       
        <div class="card m-3" style="width: 18rem;">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgA13CwSXM1k2yx2WGeLVXksg03vzvSrRpr5ZvXrZRX2d6NPlb" class="card-img-top" alt="affiche Titanic">
          <div class="card-body">
            <h5 class="card-title">Titanic</h5>
            <h6 class="card-subtitle mb-2 text-muted">Drame</h6>
            <div class="card-text">Film dans un bateau.</div>

            <div class="mt-2">
            <button type="button" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="modifier">
              <img src="./img/edit.svg" alt="bouton modifier" style="width: 20px">
            </button>
             
            <a href="#" class="btn btn-danger">
              <img src="./img/trash.svg" alt="bouton supprimer" style="width: 20px" data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer">
            </a>
          </div>
          </div>
        </div> -->

      </section>


    </main>
    
    <footer>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
  </body>
</html>