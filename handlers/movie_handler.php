<?php

// Class concernant une vidéo
class MovieHandler {
	
    // Fiche d'une vidéo [idMovie]
    function get($idMovie) {
        $movie = get_movie_by_id($idMovie);

        JSON::header(200);
        JSON::result( $movie );
    }

    // Création d'une vidéo
    function post() {
        $movie = post_create_movie_by_id('', trim($_POST['title']), trim($_POST['cover']), trim($_POST['genre']) );

        JSON::header(200);
        JSON::result( $movie );
    }

    // Mise à jour d'une vidéo [idMovie]
    function put($idMovie) {
        $movieTitle = $_REQUEST['title'];
        $movieCover = $_REQUEST['cover'];
        $movieGenre = $_REQUEST['genre'];
        put_update_movie_by_id($idMovie, $movieTitle, $movieCover, $movieGenre);

        $movie = get_movie_by_id($idMovie);

        JSON::header(200);
        JSON::result( $movie );
    }

    // Suppression d'une vidéo [idMovie]
    function delete($idMovie) {
        delete_movie_by_id($idMovie);
    }
}