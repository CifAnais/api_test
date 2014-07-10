<?php

class LikesHandler {
    // Liste des films aimés par l'utilisateur
    function get($idUser) {
        $movies = get_movies_likes($idUser);

        if( is_array($movies) && !empty($movies) ){
            JSON::header(200);
            JSON::result( $movies );
        } else{
            JSON::error(204, "No content - Cet utilisateur n'existe pas ou n'aime aucun film.");
        }
    }

    // Aimer un film
    function post($idUser, $idMovie) {
        post_likes_movies($idUser, $idMovie);
    }

    // Supprimer "Aimer" un film
    function delete($idUser, $idMovie) {
        delete_likes_movies($idUser, $idMovie);
    }

}