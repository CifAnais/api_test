<?php

class WatchlistHandler {
    // Liste des films à voir par l'utilisateur
    function get($idUser) {
        $movies = get_movies_watchlist($idUser);

        JSON::header(200);
        JSON::result( $movies );
    }

    // A voir || Supprimer "A voir"
    function post($idUser, $idMovie) {
        post_watchlist_movies($idUser, $idMovie);
    }

}