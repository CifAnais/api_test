<?php

class MoviesHandler {
    function get() {
        $movies = get_movies();

        $json = '{
		    "data":
		        '.json_encode( $movies ).'
		}' ;
		echo $json;
		return $json;
    }
}