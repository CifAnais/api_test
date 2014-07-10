<?php

class FollowedHandler {
    // Liste des utilisateurs suivis par l'utilisateur
    function get($idUser) {
        $followed = get_followed_user($idUser);

        if( is_array($followed) && !empty($followed) ){
            JSON::header(200);
            JSON::result( $followed );
        } else{
            JSON::error(204, "No content - Cet utilisateur n'existe pas ou il ne suit aucun utilisateur.");
        }
    }

    // Suivre un utilisateur
    function post($idUser, $idUserASuivre) {
        post_followed_user($idUser, $idUserASuivre);
    }

    // Ne plus suivre un utilisateur
    function delete($idUser, $idUserASuivre) {
        delete_followed_user($idUser, $idUserASuivre);
    }

}