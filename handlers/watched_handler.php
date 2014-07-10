<?php

class WatchedHandler {
    // Liste des films vu par l'utilisateur
    function get($idUser) {
        $movies = get_movies_watched($idUser);

        JSON::header(200);
        JSON::result( $movies );
    }

    // A vu || Supprimer "A vu" un film
    function post($idUser, $idMovie) {
        post_watched_movies($idUser, $idMovie);
    }

}