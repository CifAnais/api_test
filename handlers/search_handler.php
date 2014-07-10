<?php

class SearchHandler {
    function get(){
        $request = $_GET["q"];
        $type = $_GET["type"];
        $result = get_search_movies_users($request, $type);

        if( is_array($result) && !empty($result) ){
            JSON::header(200);
            JSON::result( $result );
        } else{
            JSON::error(204, "No content - Aucun resultat ne correspond à votre recherche..");
        }
    }
}