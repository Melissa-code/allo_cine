<?php 
// require_once('../config/DotEnv.php'); 
// require_once('../Entity/Movie.php');
// require_once('../Controller/MovieController.php');

    // Pour pouvoir utiliser str_contains() de PHP 8
    if (!function_exists('str_contains')) {
        function str_contains(string $haystack, string $needle): bool
        {
            return '' === $needle || false !== strpos($haystack, $needle);
        }
    }

   // Pour téléchargement des classes au lieu de multiples require
   function loadClass(string $class) {

    if($class==="DotEnv"){
      require_once "../config/$class.php";
    }
    else if(str_contains($class, "Controller")) {
      require_once "../Controller/$class.php";
    } else {
      require_once "../Entity/$class.php";
    }
  }

  spl_autoload_register("loadClass");


    $movieController = new MovieController();
    $movieController->deleteMovie($_GET["id_film"]);

    echo "<script> window.location='../index.php'</script>";