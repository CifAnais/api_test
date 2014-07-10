<?php

// Class concernant tous les utilisateurs
class UsersHandler {

	// Liste des utilisateurs
    function get() {
        $users = get_users();

        JSON::header(200);
        JSON::result( $users );
    }
}