<?php

// Class concernant toutes les vidéos
class MoviesHandler {

	// Liste des vidéos
    function get() {
        $movies = get_movies();

        if( is_array($movies) && !empty($movies) ){
            JSON::header(200);
            JSON::result( $movies );
        } else{
            JSON::error(204, "No content - Il n'existe aucune video.");
        }
    }

    // Création d'une vidéo
    function post() {
    	$movieTitle = trim($_POST['title']);
        $movieCover = trim($_POST['cover']);
        $movieGenre = trim($_POST['genre']);

        if( $movieTitle != '' && $movieCover != '' && $movieGenre != ''){
        	$movie = post_create_movie_by_id('', $movieTitle, $movieCover, $movieGenre);

        	if( is_array($movie) && !empty($movie) ){
	            JSON::header(200);
	            JSON::result( $movie );
	        } else{
	            JSON::error(400, "Bad Request - Il y a eu un probleme lors de l'enregistrement.");
	        }
        } else{
            JSON::error(400, "Bad Request - Tous les champs ne sont pas remplis");
        }

    }
}