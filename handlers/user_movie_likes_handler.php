<?php

class UserMovieLikesHandler {
    // Liste des films aimés par l'utilisateur
    function get($idUser) {
        $movies = get_movies_likes($idUser);

        $json = '{
            "data":
                '.json_encode( $movies ).'
        }' ;


        echo $json;
        return $json;
    }

    // Un utilisateur aime ou n'aime plus une vidéo
    function post($idUser, $idMovie) {
        post_likes_movies($idUser, $idMovie);

        $users = get_user_by_id($idUser);

        $json = '{
		    "data":
		        '.json_encode( $users ).'
		}' ;
		echo $json;
		return $json;
    }

}