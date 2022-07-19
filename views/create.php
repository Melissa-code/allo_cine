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
            <span><img class="logo m-3" src="../img/logo.png" alt="logo Allo Ciné"><a class="navbar-brand" href="index.html">Allo Ciné</a></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.html">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="./views/create.html">Publier un film</a>
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



        <h3>Publier un nouveau film</h3>
  

        <form method="post" class="container-fluid w-50">
            <div>
                <label for="title" class="form-label">Titre :</label>
                <input type="text" name="title" id="title" placeholder="Titre du film" class="form-control">
            </div>

            <div>
                <label for="synopsis" class="form-label">Synopsis :</label>
                <textarea name="synopsis" id="synopsis" placeholder="Résumé du film" rows="10" class="form-control"></textarea> 
            </div>

            <div>
                <label for="imageUrl" class="form-label">Image :</label>
                <input type="url" name="imageUrl" placeholder="URL de l'image du film" class="form-control">
            </div>
            <div>
                <label for="director" class="form-label">Réalisateur :</label>
                <input type="text" id="director" name="director" placeholder="Réalisateur du film" class="form-control">
            </div>

            <div>
                <label for="releaseDate" class="form-label">Date de sortie :</label>
                <input type="date" name="releaseDate" id="releaseDate" placeholder="Date de sortie" class="form-control">
            </div>

            <div>
                <label for="category" class="form-label">Catégorie :</label>
                <select name="categoryId" id="category" class="form-control">
                    <option value="">Sélectionner une catégorie</option>
                    <option value="1">Horreur</option>
                    <option value="2">Comédie</option>
                    <option value="3">Drame</option>
                </select>
            </div>

            <input type="submit" value="Publier" class="mt-3 btnPublier">
            
        </form>
    </main>


    <footer>

    </footer>



</body>
</html>