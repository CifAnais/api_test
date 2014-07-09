<?php

class MovieHandler {
	// Affichage d'un utilisateur par son ID
    function get($id) {
        $movie = get_movie_by_id($id);

        $json = '{
		    "data":
		        '.json_encode( $movie ).'
		}' ;
		echo $json;
		return $json;
    }

    // Création d'un utilisateur par son ID
    function post($id) {
        post_create_movie_by_id($id, trim($_POST['title']), trim($_POST['cover']), trim($_POST['genre']) );
        $movies = get_movie_by_id($id);

        $json = '{
		    "data":
		        '.json_encode( $movies ).'
		}' ;
		echo $json;
		return $json;
    }

    // Modification d'un utilisateur par son ID
    function put($id) {
    	$movies = get_movie_by_id($id);
    	$title = $_SERVER['title'];

        put_update_movie_by_id($id, $title);

        $json = '{
		    "data":
		        '.json_encode( $movies ).'
		}' ;
		echo $json;
		return $json;
    }

    // Suppression d'un utilisateur par son ID
    function delete($id) {
    	$movies = get_movie_by_id($id);

        delete_movie_by_id($id);
    }
}