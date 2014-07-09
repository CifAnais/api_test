<?php
/*---- USERS / MOVIES : Likes ----*/
function get_movies_likes($id) {
    $query = MySQL::getInstance()->prepare(
        "SELECT m.* 
        FROM movies AS m
        LEFT JOIN `users_movies_liaison` AS um ON m.id = um.movie_id
        WHERE um.user_id = :id AND um.likes = 1"
    );
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetch(PDO::FETCH_ASSOC);
}

function post_likes_movies($idUser, $idMovie) {
    // Vérifie si une liaison existe en l'utilisateur et la vidéo
    $requete = MySQL::getInstance()->prepare("SELECT * from users_movies_liaison WHERE user_id=:idUser and movie_id=:idMovie");
    $requete->bindValue(':idUser', $idUser, PDO::PARAM_STR);
    $requete->bindValue(':idMovie', $idMovie, PDO::PARAM_STR);
    $requete->execute();

    $result = $requete->fetch(PDO::FETCH_ASSOC);

    // Si une liaison existe
    if( !empty($result) ) { 
        // Si il n'y a pas de vu on la passe à 1
        if ($result['likes'] == NULL ) {
            $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET likes = 1, dislikes = NULL WHERE user_id=:idUser and movie_id=:idMovie");
        } // Sinon on la passe à NULL
        else{
            $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET likes = NULL WHERE user_id=:idUser and movie_id=:idMovie");
        }
        
        $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
        $query->bindValue(':idMovie', $idMovie, PDO::PARAM_STR);
        return $query->execute();
        
    } // Sinon une créer une liaison avec tout ce qu'il faut ^^ 
    else{
        $query = MySQL::getInstance()->prepare("INSERT INTO users_movies_liaison (user_id, movie_id, likes) VALUES (:idUser, :idMovie, 1)");
        $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
        $query->bindValue(':idMovie', $idMovie, PDO::PARAM_STR);
        return $query->execute();
    }
}

/*---- USERS / MOVIES : Dislikes ----*/
function get_movies_dislikes($id) {
    $query = MySQL::getInstance()->prepare(
        "SELECT m.* 
        FROM movies AS m
        LEFT JOIN `users_movies_liaison` AS um ON m.id = um.movie_id
        WHERE um.user_id = :id AND um.dislikes = 1"
    );
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetch(PDO::FETCH_ASSOC);
}

function post_dislikes_movies($idUser, $idMovie) {
    // Vérifie si une liaison existe en l'utilisateur et la vidéo
    $requete = MySQL::getInstance()->prepare("SELECT * from users_movies_liaison WHERE user_id=:idUser and movie_id=:idMovie");
    $requete->bindValue(':idUser', $idUser, PDO::PARAM_STR);
    $requete->bindValue(':idMovie', $idMovie, PDO::PARAM_STR);
    $requete->execute();

    $result = $requete->fetch(PDO::FETCH_ASSOC);

    // Si une liaison existe
    if( !empty($result) ) { 
        // Si il n'y a pas de vu on la passe à 1
        if ($result['dislikes'] == NULL ) {
            $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET dislikes = 1, likes = NULL WHERE user_id=:idUser and movie_id=:idMovie");
        } // Sinon on la passe à NULL
        else{
            $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET dislikes = NULL WHERE user_id=:idUser and movie_id=:idMovie");
        }
        
        $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
        $query->bindValue(':idMovie', $idMovie, PDO::PARAM_STR);
        return $query->execute();

    } // Sinon une créer une liaison avec tout ce qu'il faut ^^ 
    else{
        $query = MySQL::getInstance()->prepare("INSERT INTO users_movies_liaison (user_id, movie_id, dislikes) VALUES (:idUser, :idMovie, 1)");
        $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
        $query->bindValue(':idMovie', $idMovie, PDO::PARAM_STR);
        return $query->execute();
    }
}

/*---- USERS / MOVIES : Watched ----*/
function get_movies_watched($id) {
    $query = MySQL::getInstance()->prepare(
        "SELECT m.* 
        FROM movies AS m
        LEFT JOIN `users_movies_liaison` AS um ON m.id = um.movie_id
        WHERE um.user_id = :id AND um.watched = 1"
    );
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function post_watched_movies($idUser, $idMovie) {
    // Vérifie si une liaison existe en l'utilisateur et la vidéo
    $requete = MySQL::getInstance()->prepare("SELECT * from users_movies_liaison WHERE user_id=:idUser and movie_id=:idMovie");
    $requete->bindValue(':idUser', $idUser, PDO::PARAM_STR);
    $requete->bindValue(':idMovie', $idMovie, PDO::PARAM_STR);
    $requete->execute();

    $result = $requete->fetch(PDO::FETCH_ASSOC);

    // Si une liaison existe
    if( !empty($result) ) { 
        // Si il n'y a pas de vu on la passe à 1
        if ($result['watched'] == NULL ) {
            $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET watched = 1, watchlist = NULL WHERE user_id=:idUser and movie_id=:idMovie");
        } // Sinon on la passe à NULL
        else{
            $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET watched = NULL WHERE user_id=:idUser and movie_id=:idMovie");
        }
        
        $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
        $query->bindValue(':idMovie', $idMovie, PDO::PARAM_STR);
        return $query->execute();
    } // Sinon une créer une liaison avec tout ce qu'il faut ^^ 
    else{
        $query = MySQL::getInstance()->prepare("INSERT INTO users_movies_liaison (user_id, movie_id, watched) VALUES (:idUser, :idMovie, 1)");
        $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
        $query->bindValue(':idMovie', $idMovie, PDO::PARAM_STR);
        return $query->execute();
    }
}

/*---- USERS / MOVIES : Watchlist ----*/
function get_movies_watchlist($id) {
    $query = MySQL::getInstance()->prepare(
        "SELECT m.* 
        FROM movies AS m
        LEFT JOIN `users_movies_liaison` AS um ON m.id = um.movie_id
        WHERE um.user_id = :id AND um.watchlist = 1"
    );
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function post_watchlist_movies($idUser, $idMovie) {
    // Vérifie si une liaison existe en l'utilisateur et la vidéo
    $requete = MySQL::getInstance()->prepare("SELECT * from users_movies_liaison WHERE user_id=:idUser and movie_id=:idMovie");
    $requete->bindValue(':idUser', $idUser, PDO::PARAM_STR);
    $requete->bindValue(':idMovie', $idMovie, PDO::PARAM_STR);
    $requete->execute();

    $result = $requete->fetch(PDO::FETCH_ASSOC);

    // Si une liaison existe
    if( !empty($result) ) { 
        // Si il n'y a pas de vu on la passe à 1
        if ($result['watchlist'] == NULL ) {
            $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET watchlist = 1, watched = NULL WHERE user_id=:idUser and movie_id=:idMovie");
        } // Sinon on la passe à NULL
        else{
            $query = MySQL::getInstance()->prepare("UPDATE users_movies_liaison SET watchlist = NULL WHERE user_id=:idUser and movie_id=:idMovie");
        }
        
        $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
        $query->bindValue(':idMovie', $idMovie, PDO::PARAM_STR);
        return $query->execute();
    } // Sinon une créer une liaison avec tout ce qu'il faut ^^ 
    else{
        $query = MySQL::getInstance()->prepare("INSERT INTO users_movies_liaison (user_id, movie_id, watchlist) VALUES (:idUser, :idMovie, 1)");
        $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
        $query->bindValue(':idMovie', $idMovie, PDO::PARAM_STR);
        return $query->execute();
    }
}