<?php

require_once 'classes/list_movie.class.php';
require_once 'classes/movie_manager.class.php';


//create moviemanager object

$movie_manager = MovieManager::getMovieManager();

//get all the movies from the database
$movies = $movie_manager->list_movie();

//error handling
if(!$movies) {
    $message = "There was a problem getting the movies from the database";
    header("Location:show_error.php?eMage=$message");
    exit;
}


//display all the movies in the grid
$view = new ListMovie();
$view->display($movies);