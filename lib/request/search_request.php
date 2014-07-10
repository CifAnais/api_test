<?php
/*---- RECHERCHE VIDÉOS || UTILISATEURS ----*/

function get_search_movies_users($request, $type){
    // Évite les conflits d'apostrophes
    $request = str_replace("'","''", $request);

    if( $type == 'movies' ){
        $query = MySQL::getInstance()->query(
            "SELECT * 
            FROM movies 
            WHERE `id` LIKE '%$request%'
            OR `title` LIKE '%$request%'
            OR `cover` LIKE '%$request%'
            OR `genre` LIKE '%$request%' "
        );
    } elseif( $type == 'users' ){
        $query = MySQL::getInstance()->query(
            "SELECT * 
            FROM users 
            WHERE `id` LIKE '%$request%' 
            OR `username` LIKE '%$request%' "
        );
    } else{
        $error = array(
            'meta' => array( 
                'code' => 400, 
                'error' => 'Bad Request - Les parametres sont mauvais ou manquants.'
            )
        );

        return $error;
        exit;
    }

    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
