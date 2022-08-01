<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../style.css">
    <title>Allo Ciné - Publier un film</title>
</head>

<body>

    <header>
        <!-- Barre de navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
          <div class="container-fluid">
            <span><img class="logo m-3" src="../img/logo.png" alt="logo Allo Ciné"><a class="navbar-brand" href="../index.php">Allo Ciné</a></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="create.php">Publier un film</a>
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

    <?php

      if (!function_exists('str_contains')) {
        function str_contains(string $haystack, string $needle): bool
        {
            return '' === $needle || false !== strpos($haystack, $needle);
        }
      }
  
      function loadClass(string $class)
      {
          if($class === "DotEnv") {
            require_once "../config/$class.php";
          }
          else if (str_contains($class, "Controller")) {
              require_once "../Controller/$class.php";
          } else {
              require_once "../Entity/$class.php";
          } 
      }
  
      spl_autoload_register("loadClass");

      $categoryController = new CategoryController();
      $categories = $categoryController->getAll();
      //print_r($categories); 
  
      if($_POST) {
        $movieController = new MovieController();
        $newMovie = new Movie($_POST); 
        $movieController->create($newMovie); 
      }
?>

    <main>

        <h3>Publier un nouveau film</h3>

        <form method="post"  class="container-fluid w-50">
            <div>
                <label for="titre_film" class="form-label">Titre :</label>
                <input type="text" name="titre_film" id="titre_film" placeholder="Titre du film" class="form-control">
            </div>

            <div>
                <label for="description_film" class="form-label">Synopsis :</label>
                <textarea name="description_film" id="description_film" placeholder="Résumé du film" rows="10" class="form-control"></textarea> 
            </div>

            <div>
                <label for="imageUrl_film" class="form-label">Image :</label>
                <input type="url" name="imageUrl_film" id="imageUrl_film" placeholder="URL de l'image du film" class="form-control">
            </div>
            <div>
                <label for="realisateur" class="form-label">Réalisateur :</label>
                <input type="text" name="realisateur" id="realisateur" placeholder="Réalisateur" class="form-control">
            </div>

            <div>
                <label for="dateSortie_film" class="form-label">Date de sortie :</label>
                <input type="date" name="dateSortie_film" id="dateSortie_film" placeholder="Date de sortie" class="form-control">
            </div>

            <div>
                <label for="categorie_id" class="form-label">Catégorie :</label>
                
                <select name="categorie_id" id="categorie_id" class="form-control">
                  <option value="">Sélectionner une catégorie</option>

                  <?php

                      foreach($categories as $category) : ?>
                        <option value="<?= $category->getId_categorie() ?>"><?= $category->getNom_categorie() ?></option>
                      <?php endforeach ?>
                  
                </select>
            </div>

            <input type="submit" value="Publier" class="mt-3 btnPublier">
            
        </form>
    </main>


    <footer>

    </footer>



</body>
</html>