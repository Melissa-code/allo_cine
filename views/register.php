<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../style.css">
    <title>Allo Ciné - S'inscrire</title>
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
                <ul class="navbar-nav mb-2 mb-lg-0 me-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href=".create.php">Publier un film</a>
                  </li>
                </ul>

                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="./register.php">S'inscrire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./login.php">Se connecter</a>
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

    
    <?php

  session_start(); 
    if (!function_exists('str_contains')) {
      function str_contains(string $haystack, string $needle): bool
      {
          return '' === $needle || false !== strpos($haystack, $needle);
      }
    }

    function loadClass(string $class){
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


    $userController = new UserController(); 


    if($_POST) {
      if($_POST['password_user'] === $_POST['confirmPassword']) {
        unset($_POST['confirmPassword']);
        $_POST['password_user'] = password_hash($_POST['password_user'], PASSWORD_DEFAULT);
        $newUser = new User($_POST);
        $userController->create($newUser); 
        echo "<script> window.location='../index.php'</script>";
        $_SESSION['username_user'] = $_POST['username_user']; 
        $_SESSION['email_user'] = $_POST['email_user']; 
      }
      else {
        echo "<p>Mot de passe erroné</p></p>"; 
      }

    }

    ?>

    <main>

        <div class="title p-3">
            <h3>Créer un compte utilisateur</h3>
        </div>

        <section class="container d-flex mt-4 justify-content-center ">
            <form action="./register.php" method="post">

              <!-- Nom d'utilisateur -->
              <div class="pb-3">
                <label for="username_user" class="form-label">Nom d'utilisateur</label>
                <input type="text" id="username_user" name="username_user" class="form-control" placeholder="Nom d'utilisateur" required>
              </div>
                
              <!-- Email -->
              <div class="pb-3">
                <label for="email_user" class="form-label">Email</label>
                <input type="email" id="email_user" name="email_user" class="form-control" placeholder="Email" required>
              </div>
                
              <!-- Mot de passe -->
              <div class="pb-3">
                <label for="password_user" class="form-label">Mot de passe</label>
                <input type="password" id="password_user" name="password_user" class="form-control" placeholder="Mot de passe" required>
              </div>
                
              <!-- Confirmation du mot de passe -->
              <div class="pb-3">
                <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirmer le mot de passe" required>
              </div>
                
                <input type="submit" value="Créer un compte" class="mt-3 btnPublier">
            </form>
        </section>
    </main>


    <footer></footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>

  </body>
</html>