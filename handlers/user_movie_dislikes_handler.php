<?php

class UserMovieDislikesHandler {
    // Liste des films aimés par l'utilisateur
    function get($idUser) {
        $movies = get_movies_dislikes($idUser);

        $json = '{
            "data":
                '.json_encode( $movies ).'
        }' ;


        echo $json;
        return $json;
    }

    // Un utilisateur n'aime pas ou n'a pas d'avis pour une vidéo
    function post($idUser, $idMovie) {
        post_dislikes_movies($idUser, $idMovie);

        $users = get_user_by_id($idUser);

        $json = '{
		    "data":
		        '.json_encode( $users ).'
		}' ;
		echo $json;
		return $json;
    }

}