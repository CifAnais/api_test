<?php

class LikesHandler {
    // Liste des films aimés par l'utilisateur
    function get($idUser) {
        $movies = get_movies_likes($idUser);

        JSON::header(200);
        JSON::result( $movies );
    }

    // Aimer || Supprimer "Aimer" un film
    function post($idUser, $idMovie) {
        post_likes_movies($idUser, $idMovie);
    }

}