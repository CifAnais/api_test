<?php

class WatchlistHandler {
    // Liste des films à voir par l'utilisateur
    function get($idUser) {
        $movies = get_movies_watchlist($idUser);

        if( is_array($movies) && !empty($movies) ){
            JSON::header(200);
            JSON::result( $movies );
        } else{
            JSON::error(204, "No content - Cet utilisateur n'existe pas ou il n'a aucun film à voir.");
        }
    }

    // Film à voir
    function post($idUser, $idMovie) {
        post_watchlist_movies($idUser, $idMovie);
    }

    // Supprimer film "A voir" 
    function delete($idUser, $idMovie) {
        delete_watchlist_movies($idUser, $idMovie);
    }

}