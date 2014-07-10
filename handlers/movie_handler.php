<?php

// Class concernant une vidéo
class MovieHandler {
	
    // Fiche d'une vidéo [idMovie]
    function get($idMovie) {
        $movie = get_movie_by_id($idMovie);

        if( is_array($movie) && !empty($movie) ){
            JSON::header(200);
            JSON::result( $movie );
        } else{
            JSON::error(204, "No content - Cette video n'existe pas.");
        }
    }

    // Mise à jour d'une vidéo [idMovie]
    function put($idMovie) {
        $movieTitle = $_REQUEST['title'];
        $movieCover = $_REQUEST['cover'];
        $movieGenre = $_REQUEST['genre'];
        put_update_movie_by_id($idMovie, $movieTitle, $movieCover, $movieGenre);

        $movie = get_movie_by_id($idMovie);

        if( is_array($movie) && !empty($movie) ){
            JSON::header(200);
            JSON::result( $movie );
        } else{
            JSON::error(204, "No content - Cette video n'existe pas.");
        }
    }

    // Suppression d'une vidéo [idMovie]
    function delete($idMovie) {
        delete_movie_by_id($idMovie);
    }
}