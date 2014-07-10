<?php

// Class concernant un utilisateur
class UserHandler {
	// Profil d'un utilisateur [idUser]
    function get($idUser) {
        $user = get_user_by_id($idUser);

        JSON::header(200);
        JSON::result( $user );
    }

    // Création d'un utilisateur [idUser]
    function post($idUser) {
        post_create_user_by_id($idUser, trim($_POST['username']));
        $user = get_user_by_id($idUser);

        JSON::header(200);
        JSON::result( $user );
    }

    // Mise à jour d'un utilisateur [idUser]
    function put($idUser) {
    	$userName = $_REQUEST['username'];
        put_update_user_by_id( $idUser, $userName );

        $user = get_user_by_id($idUser);

        JSON::header(200);
        JSON::result( $user );
    }

    // Suppression d'un utilisateur [idUser]
    function delete($idUser) {
        delete_user_by_id($idUser);
    }
}