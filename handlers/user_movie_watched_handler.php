<?php

class UserMovieWatchedHandler {
    // Liste des films vu par l'utilisateur
    function get($idUser) {
        $movies = get_movies_watched($idUser);

        $json = '{
            "data":
                '.json_encode( $movies ).'
        }' ;


        echo $json;
        return $json;
    }

    // Un utilisateur a vu ou n'a pas vu une vidéo
    function post($idUser, $idMovie) {
        post_watched_movies($idUser, $idMovie);

        $users = get_user_by_id($idUser);

        $json = '{
		    "data":
		        '.json_encode( $users ).'
		}' ;
		echo $json;
		return $json;
    }

}