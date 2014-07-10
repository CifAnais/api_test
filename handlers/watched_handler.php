<?php

class WatchedHandler {
    // Liste des films vu par l'utilisateur
    function get($idUser) {
        $movies = get_movies_watched($idUser);

        if( is_array($movies) && !empty($movies) ){
            JSON::header(200);
            JSON::result( $movies );
        } else{
            JSON::error(204, "No content - Cet utilisateur n'existe pas ou il n'a vu aucun film.");
        }
    }

    // A vu un film
    function post($idUser, $idMovie) {
        post_watched_movies($idUser, $idMovie);
    }

    // Supprimer "A vu" un film
    function delete($idUser, $idMovie) {
        delete_watched_movies($idUser, $idMovie);
    }

}