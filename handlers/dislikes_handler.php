<?php

class DislikesHandler {
    // Liste des films que l'utilisateur n'aime pas
    function get($idUser) {
        $movies = get_movies_dislikes($idUser);

        JSON::header(200);
        JSON::result( $movies );
    }

    // Ne pas aimer / Supprimer "Ne pas aimer"
    function post($idUser, $idMovie) {
        post_dislikes_movies($idUser, $idMovie);
    }

}