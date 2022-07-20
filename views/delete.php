<?php 
require_once('../config/DotEnv.php'); 
require_once('../Entity/Movie.php');
require_once('../Controller/MovieController.php');


$movieController = new MovieController();
$movieController->deleteMovie($_GET["id_film"]);