<?php

class DislikesHandler {
    // Liste des films que l'utilisateur n'aime pas
    function get($idUser) {
        $movies = get_movies_dislikes($idUser);

        if( is_array($movies) && !empty($movies) ){
            JSON::header(200);
            JSON::result( $movies );
        } else{
            JSON::error(204, "No content - Cet utilisateur n'existe pas ou il n'y a aucun film qu'il n'aime pas.");
        }
    }

    // Ne pas aimer un film
    function post($idUser, $idMovie) {
        post_dislikes_movies($idUser, $idMovie);
    }

    // Supprimer "Ne pas aimer" un film
    function delete($idUser, $idMovie) {
        delete_dislikes_movies($idUser, $idMovie);
    }

}