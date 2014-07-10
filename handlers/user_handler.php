<?php

// Class concernant un utilisateur
class UserHandler {
	// Profil d'un utilisateur [idUser]
    function get($idUser) {
        $user = get_user_by_id($idUser);

        if( is_array($user) && !empty($user) ){
            JSON::header(200);
            JSON::result( $user );
        } else{
            JSON::error(204, "No content - Cet utilisateur n'existe pas.");
        }
    }

    // Création d'un utilisateur [idUser]
    function post($idUser) {
        $userName = trim($_POST['username']);

        if( $userName != '' ){
            post_create_user_by_id($idUser, $userName);
            $user = get_user_by_id($idUser);

            if( is_array($user) && !empty($user) ){
                JSON::header(200);
                JSON::result( $user );
            } else{
                JSON::error(400, "Bad Request - Il y a eu un probleme lors de l'enregistrement.");
            }
        } else{
            JSON::error(400, "Bad Request - Tous les champs ne sont pas remplis.");
        }
    }

    // Mise à jour d'un utilisateur [idUser]
    function put($idUser) {
    	$userName = $_REQUEST['username'];

        if( $userName != '' ){
            put_update_user_by_id( $idUser, $userName );
            $user = get_user_by_id($idUser);

            if( is_array($user) && !empty($user) ){
                JSON::header(200);
                JSON::result( $user );
            } else{
                JSON::error(400, "Bad Request - Il y a eu un probleme lors de l'enregistrement.");
            }
        } else{
            JSON::error(400, "Bad Request - Tous les champs ne sont pas remplis.");
        }
    }

    // Suppression d'un utilisateur [idUser]
    function delete($idUser) {
        delete_user_by_id($idUser);
    }
}