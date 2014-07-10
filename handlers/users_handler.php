<?php

// Class concernant tous les utilisateurs
class UsersHandler {

	// Liste des utilisateurs
    function get() {
        $users = get_users();

        if( is_array($users) && !empty($users) ){
            JSON::header(200);
            JSON::result( $users );
        } else{
            JSON::error(204, "No content - Il n'existe aucun utilisateur.");
        }
    }
}