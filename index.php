<?php

require("handlers/user_handler.php");
require("handlers/users_handler.php");
require("handlers/movies_handler.php");
require("handlers/movie_handler.php");
require("lib/markdown.php");
require("lib/mysql.php");
require("lib/queries.php");
require("lib/Toro.php");

ToroHook::add("404", function() {
    echo "Not found";
});

Toro::serve(array(
	/*---- USERS ----*/
	// Affichage de tous les utilisateurs : GET
    "/users" => "UsersHandler",

    // Affiche d'un seul utilisateur via son ID : GET
    "/users/:number" => "UserHandler",

    // Créer un utilisateur avec paramètre ID : POST
    "/users/:number" => "UserHandler",

    // Mettre à jour un utilisateur via son ID : PUT
    "/users/:number" => "UserHandler",

    // Supprimer un utilisateur via son ID : DELETE
    "/users/:number" => "UserHandler",


    /*---- MOVIES ----*/
	// Affichage de toutes les vidéos : GET
    "/movies" => "MoviesHandler",

    // Affiche d'une seule vidéo via son ID : GET
    "/movies/:number" => "MovieHandler",

    // Créer une vidéo avec paramètre ID : POST
    "/movies/:number" => "MovieHandler",

    // Mettre à jour une vidéo via son ID : PUT
    "/movies/:number" => "MovieHandler",

    // Supprimer une vidéo via son ID : DELETE
    "/movies/:number" => "MovieHandler"
));