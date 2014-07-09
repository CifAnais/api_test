<?php

class UserHandler {
	// Affichage d'un utilisateur par son ID
    function get($id) {
        $user = get_user_by_id($id);

        $json = '{
		    "data":
		        '.json_encode( $user ).'
		}' ;


		echo $json;
		return $json;
    }

    // Création d'un utilisateur par son ID
    function post($id) {
        post_create_user_by_id($id, trim($_POST['username']));
        $users = get_user_by_id($id);

        $json = '{
		    "data":
		        '.json_encode( $users ).'
		}' ;
		echo $json;
		return $json;
    }

    // Modification d'un utilisateur par son ID
    function put($id) {
    	$users = get_user_by_id($id);
    	$username = $_SERVER['username'];

        put_update_user_by_id($id, $username);

        $json = '{
		    "data":
		        '.json_encode( $users ).'
		}' ;
		echo $json;
		return $json;
    }

    // Suppression d'un utilisateur par son ID
    function delete($id) {
    	$users = get_user_by_id($id);

        delete_user_by_id($id);
    }
}