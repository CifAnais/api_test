<?php

class UsersHandler {
    function get() {
        $users = get_users();

        $json = '{
		    "data":
		        '.json_encode( $users ).'
		}' ;
		echo $json;
		return $json;
    }
}