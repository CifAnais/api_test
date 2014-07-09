<?php

class UserMovieWatchlistHandler {
    // Liste des films à voir par l'utilisateur
    function get($idUser) {
        $movies = get_movies_watchlist($idUser);

        $json = '{
            "data":
                '.json_encode( $movies ).'
        }' ;


        echo $json;
        return $json;
    }

    // Un utilisateur met ou retire un film "à voir"
    function post($idUser, $idMovie) {
        post_watchlist_movies($idUser, $idMovie);

        $users = get_user_by_id($idUser);

        $json = '{
		    "data":
		        '.json_encode( $users ).'
		}' ;
		echo $json;
		return $json;
    }

}