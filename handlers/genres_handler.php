<?php

// Class concernant tous les genres des vidéos
class GenresHandler {

	// Liste des genre des vidéos
    function get() {
        $genres = get_movies_genres();

        if( is_array($genres) && !empty($genres) ){
            JSON::header(200);
            JSON::result( $genres );
        } else{
            JSON::error(204, "No content - Aucun genre de vidéos.");
        }
    }
}