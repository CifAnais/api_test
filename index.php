<?php

// GESTION FRAMEWORK, BDD, JSON
require("lib/toro.php");
require("lib/mysql.php");
require("lib/json.php");

// UTILISATEUR
require("handlers/user_handler.php");
require("handlers/users_handler.php");
require("lib/request/users_request.php");

// VIDÉOS
require("handlers/movies_handler.php");
require("handlers/movie_handler.php");
require("handlers/genres_handler.php");
require("lib/request/movies_request.php");

// LIKES, DISLIKES, WATCHED, WATCHLIST
require("handlers/likes_handler.php");
require("handlers/dislikes_handler.php");
require("handlers/watched_handler.php");
require("handlers/watchlist_handler.php");
require("lib/request/users_movies_request.php");

// SEARCH, FOLLOWERS, FOLLOWED
require("handlers/search_handler.php");
require("lib/request/search_request.php");
require("handlers/followers_handler.php");
require("handlers/followed_handler.php");
require("lib/request/follow_request.php");


ToroHook::add("404", function() {
    JSON::header(404);
    JSON::result(array( 'meta' => array( 'code' => 404, 'error' => 'Not Found - Page non trouvée' ) ));
});

Toro::serve(array(
	/*---- USERS ----*/
    "v1/users" => "UsersHandler",         // Liste des utilisateurs : GET
    "v1/users/:number" => "UserHandler",  // Profil d'un utilisateur [idUser] : GET
    "v1/users/:number" => "UserHandler",  // Création d'un utilisateur [idUser] : POST
    "v1/users/:number" => "UserHandler",  // Mise à jour d'un utilisateur [idUser] : PUT
    "v1/users/:number" => "UserHandler",  // Suppression d'un utilisateur [idUser] : DELETE


    /*---- MOVIES ----*/
    "v1/movies" => "MoviesHandler",             // Liste des vidéos : GET
    "v1/movies/:number" => "MovieHandler",      // Fiche d'une vidéo [idMovie] : GET
    "v1/movies" => "MoviesHandler",              // Création d'une vidéo : POST
    "v1/movies/:number" => "MovieHandler",      // Mise à jour d'une vidéo [idMovie] : PUT
    "v1/movies/:number" => "MovieHandler",      // Suppression d'une vidéo [idMovie] : DELETE
    "v1/genres" => "GenresHandler",             // Liste de tous les genres de film : GET


    /*---- LIKES, DISLIKES, WATCHED, WATCHLIST ----*/
    "v1/users/:number/likes" => "LikesHandler",                  // Liste des films aimés par l'utilisateur [idUser] : GET
    "v1/users/:number/likes/:number" => "LikesHandler",          // Aimer || Supprimer "Aimer" un film [idUser][idMovie] : POST / DELETE  
    "v1/users/:number/dislikes" => "DislikesHandler",            // Liste des films que l'utilisateur n'aime pas [idUser] : GET
    "v1/users/:number/dislikes/:number" => "DislikesHandler",    // Ne pas aimer / Supprimer "Ne pas aimer" un film [idUser][idMovie] : POST
    "v1/users/:number/watched" => "WatchedHandler",              // Liste des films vu par l'utilisateur [idUser] : GET
    "v1/users/:number/watched/:number" => "WatchedHandler",      // A vu || Supprimer "A vu" un film [idUser][idMovie] : POST
    "v1/users/:number/watchlist" => "WatchlistHandler",          // Liste des films à voir par l'utilisateur [idUser] : GET
    "v1/users/:number/watchlist/:number" => "WatchlistHandler",  // A voir || Supprimer "A voir" [idUser][idMovie] : POST


    /*---- RECHERCHE ----*/
    "v1/search" => "SearchHandler",


    /*---- FOLLOWS ----*/
    "v1/users/:number/followed/:number" => "FollowedHandler",       // Suivre || Ne plus suivre un utilisateur [idUser][idUser] : POST / DELETE
    "v1/users/:number/followed" => "FollowedHandler",               // Liste des utilisateurs suivis par l'utilisateur. [idUser] : GET
    "v1/users/:number/followers" => "FollowersHandler"             // Liste des utilisateurs qui suivent un utilisateur [idUser] : GET

));