<?php

// Class concernant toutes les vidéos
class MoviesHandler {

	// Liste des vidéos
    function get() {
        $movies = get_movies();

        JSON::header(200);
        JSON::result( $movies );
    }
}