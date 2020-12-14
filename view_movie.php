<?php

//retrieve movie id from a query string variable
if(!isset($_GET['id']) || !is_int(intval($_GET['id']))) {
    $message = "Movie id is invalid.";
    header('Location:show_error.php?eMsg=$message');
    exit;
}

$id = intval($_GET['id']);

require_once 'classes/view_movie.class.php';
require_once 'classes/movie_manager.class.php';

//create a movie manager objecr
$movie_manager = MovieManager::getMovieManager();

//get the movie object
$movie = $movie_manager->view_movie($id);

//handle errors before proceeding
if(!$movie) {
    $message = "There was a problem getting the movie from the database.";
    header('Location:show_error.php?eMsg=$message');
    exit;
}

//display the movie
$view = new ViewMovie();
$view->display($movie);
