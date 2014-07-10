<?php
/*---- USERS / MOVIES : Likes ----*/
// Liste des films aimés par l'utilisateur
function get_movies_likes($idUser) {
    $query = MySQL::getInstance()->prepare(
        "SELECT m.* 
        FROM movies AS m
        LEFT JOIN `users_movies_liaison` AS uml ON m.id = uml.movie_id
        WHERE uml.user_id = :id AND uml.likes = 1"
    );
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetch(PDO::FETCH_ASSOC);
}

function liaison_user_movie($idUser, $idMovie){
    // Vérifie si une liaison existe en l'utilisateur et la vidéo
    $requete = MySQL::getInstance()->prepare("SELECT * from users_movies_liaison WHERE user_id=:idUser and movie_id=:idMovie");
    $requete->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $requete->bindValue(':idMovie', $idMovie, PDO::PARAM_INT);
    $requete->execute();

    $result = $requete->fetch(PDO::FETCH_ASSOC);

    return $result;
}

// Aimer un film
function post_likes_movies($idUser, $idMovie) {
    $liaison = liaison_user_movie($idUser, $idMovie);

    // Si une liaison existe
    if( $liaison != false ) { 
        $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET likes = 1, dislikes = NULL WHERE user_id=:idUser and movie_id=:idMovie");
    } 
    // Sinon une créer une liaison avec tout ce qu'il faut ^^ 
    else{
        $query = MySQL::getInstance()->prepare("INSERT INTO users_movies_liaison (user_id, movie_id, likes) VALUES (:idUser, :idMovie, 1)");
    }

    $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idMovie', $idMovie, PDO::PARAM_INT);
    return $query->execute();
}

// Supprimer "Aimer" un film
function delete_likes_movies($idUser, $idMovie) {
    $liaison = liaison_user_movie($idUser, $idMovie);

    // Si une liaison existe
    if( $liaison != false ) { 
        $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET likes = NULL WHERE user_id=:idUser and movie_id=:idMovie"); 
        $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $query->bindValue(':idMovie', $idMovie, PDO::PARAM_INT);
        return $query->execute();
    }
}

/*---- USERS / MOVIES : Dislikes ----*/
// Liste des films que l'utilisateur n'aime pas
function get_movies_dislikes($idUser) {
    $query = MySQL::getInstance()->prepare(
        "SELECT m.* 
        FROM movies AS m
        LEFT JOIN `users_movies_liaison` AS uml ON m.id = uml.movie_id
        WHERE uml.user_id = :id AND uml.dislikes = 1"
    );
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetch(PDO::FETCH_ASSOC);
}

// Ne pas aimer un film
function post_dislikes_movies($idUser, $idMovie) {
    $liaison = liaison_user_movie($idUser, $idMovie);

    // Si une liaison existe
    if( $liaison != false ) {
        $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET dislikes = 1, likes = NULL WHERE user_id=:idUser and movie_id=:idMovie");
    } // Sinon une créer une liaison avec tout ce qu'il faut ^^ 
    else{
        $query = MySQL::getInstance()->prepare("INSERT INTO users_movies_liaison (user_id, movie_id, dislikes) VALUES (:idUser, :idMovie, 1)");
    }

    $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idMovie', $idMovie, PDO::PARAM_INT);
    return $query->execute();
}

// Supprimer "Ne pas aimer" un film
function delete_dislikes_movies($idUser, $idMovie) {
    $liaison = liaison_user_movie($idUser, $idMovie);

    // Si une liaison existe
    if( $liaison != false ) {
        $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET dislikes = NULL WHERE user_id=:idUser and movie_id=:idMovie");
        $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $query->bindValue(':idMovie', $idMovie, PDO::PARAM_INT);

        return $query->execute();
    } 
}

/*---- USERS / MOVIES : Watched ----*/
// Liste des films vu par l'utilisateur
function get_movies_watched($idUser) {
    $query = MySQL::getInstance()->prepare(
        "SELECT m.* 
        FROM movies AS m
        LEFT JOIN `users_movies_liaison` AS um ON m.id = um.movie_id
        WHERE um.user_id = :id AND um.watched = 1"
    );
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// A vu un film
function post_watched_movies($idUser, $idMovie) {
    $liaison = liaison_user_movie($idUser, $idMovie);

    // Si une liaison existe
    if( $liaison != false ) {
        $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET watched = 1, watchlist = NULL WHERE user_id=:idUser and movie_id=:idMovie");
    } // Sinon une créer une liaison avec tout ce qu'il faut ^^ 
    else{
        $query = MySQL::getInstance()->prepare("INSERT INTO users_movies_liaison (user_id, movie_id, watched) VALUES (:idUser, :idMovie, 1)");
    }
    $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idMovie', $idMovie, PDO::PARAM_INT);
    return $query->execute();
}

// Supprimer "A vu" un film
function delete_watched_movies($idUser, $idMovie) {
    $liaison = liaison_user_movie($idUser, $idMovie);

    // Si une liaison existe
    if( $liaison != false ) {
        $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET watched = NULL WHERE user_id=:idUser and movie_id=:idMovie");
    } // Sinon une créer une liaison avec tout ce qu'il faut ^^ 
    else{
        $query = MySQL::getInstance()->prepare("INSERT INTO users_movies_liaison (user_id, movie_id, watched) VALUES (:idUser, :idMovie, 1)");
    }

    $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idMovie', $idMovie, PDO::PARAM_INT);
    return $query->execute();
}

/*---- USERS / MOVIES : Watchlist ----*/
// Liste des films à voir par l'utilisateur
function get_movies_watchlist($idUser) {
    $query = MySQL::getInstance()->prepare(
        "SELECT m.* 
        FROM movies AS m
        LEFT JOIN `users_movies_liaison` AS um ON m.id = um.movie_id
        WHERE um.user_id = :id AND um.watchlist = 1"
    );
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// A voir
function post_watchlist_movies($idUser, $idMovie) {
    $liaison = liaison_user_movie($idUser, $idMovie);

    // Si une liaison existe
    if( $liaison != false ) {
        $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET watchlist = 1, watched = NULL WHERE user_id=:idUser and movie_id=:idMovie");
    } // Sinon une créer une liaison avec tout ce qu'il faut ^^ 
    else{
        $query = MySQL::getInstance()->prepare("INSERT INTO users_movies_liaison (user_id, movie_id, watchlist) VALUES (:idUser, :idMovie, 1)");
    }

    $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idMovie', $idMovie, PDO::PARAM_INT);
    return $query->execute();
}

// Supprimer "A voir"
function delete_watchlist_movies($idUser, $idMovie) {
    $liaison = liaison_user_movie($idUser, $idMovie);

    // Si une liaison existe
    if( $liaison != false ) {
        $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET watchlist = NULL WHERE user_id=:idUser and movie_id=:idMovie");
        $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $query->bindValue(':idMovie', $idMovie, PDO::PARAM_INT);
        return $query->execute();
    } 
}