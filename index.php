<?php

// UTILISATEUR
require("handlers/user_handler.php");
require("handlers/users_handler.php");
require("lib/request/users_request.php");

// VIDÉOS
require("handlers/movies_handler.php");
require("handlers/movie_handler.php");
require("lib/request/movies_request.php");

// LIKES, DISLIKES, WATCHED, WATCHLIST
require("handlers/user_movie_likes_handler.php");
require("handlers/user_movie_dislikes_handler.php");
require("handlers/user_movie_watched_handler.php");
require("handlers/user_movie_watchlist_handler.php");
require("lib/request/users_movies_request.php");

// GESTION FRAMEWORK ET BDD
require("lib/markdown.php");
require("lib/mysql.php");
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

    // Liste des films qu'aime un utilisateur : GET
    "/users/:number/likes" => "UserMovieLikesHandler",

    // Aimer / Ne plus aimer un film via l'ID de l'user et de la movie : POST
    "/users/:number/likes/:number" => "UserMovieLikesHandler",

    // Liste des films que n'aime pas un utilisateur : GET
    "/users/:number/dislikes" => "UserMovieDislikesHandler",

    // Ne pas aimer / Ne plus ne pas aimer un film via l'ID de l'user et de la movie : POST
    "/users/:number/dislikes/:number" => "UserMovieDislikesHandler",

    // Liste des films vu par un utilisateur : GET
    "/users/:number/watched" => "UserMovieWatchedHandler",

    // A vu / N'a pas vu un film via l'ID de l'user et de la movie : POST
    "/users/:number/watched/:number" => "UserMovieWatchedHandler",

    // Liste des films à voir par un utilisateur : GET
    "/users/:number/watchlist" => "UserMovieWatchlistHandler",

    // A voir / Ne plus à voir via l'ID de l'user et de la movie : POST
    "/users/:number/watchlist/:number" => "UserMovieWatchlistHandler",

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