<?php 

// Function d'extraction en format JSON
class JSON{

	// On ajoute le header
	static function header($status){
		header('Content-type: application/json; charset=utf-8');
		header('HTTP/1.1 '. $status);
	}

	// On affiche le résultat en JSON
	static function result($result){
		$json = '{
		    "data":
		        '.json_encode( $result ).'
		}' ;
		echo $json;
	}

	// On affiche une erreur en JSON
	static function error($code, $error){
        $json = json_encode( array('meta' => array( 'code' => $code, 'error' => $error )));

        echo $json;
    }
}