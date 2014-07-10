<?php

class FollowersHandler {
    // Liste des utilisateurs qui suivent un utilisateur
    function get($idUser) {
        $followers = get_followers_user($idUser);

        if( is_array($followers) && !empty($followers) ){
            JSON::header(200);
            JSON::result( $followers );
        } else{
            JSON::error(204, "No content - Cet utilisateur n'existe pas ou aucun utilisateur ne le suit.");
        }
    }

}