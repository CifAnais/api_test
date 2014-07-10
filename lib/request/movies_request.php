<?php
/*---- MOVIES ----*/
// Liste des vidéos
function get_movies() {
    $query = MySQL::getInstance()->query("SELECT `id`, `title`, `cover`, `genre` FROM movies");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Fiche d'une vidéo
function get_movie_by_id($idMovie) {
    $query = MySQL::getInstance()->prepare("SELECT `id`, `title`, `cover`, `genre` FROM movies WHERE id=:id");
    $query->bindValue(':id', $idMovie, PDO::PARAM_INT);
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}

// Création d'une vidéo
function post_create_movie_by_id($idMovie = NULL, $movieTitle, $movieCover, $movieGenre) {

    $pdo = MySQL::getInstance(); 
    $request = "INSERT INTO movies (id, title, cover, genre) VALUES ('', :title, :cover, :genre)";
    
    $query = $pdo->prepare($request);
    $query->bindValue(':title', $movieTitle, PDO::PARAM_STR);
    $query->bindValue(':cover', $movieCover, PDO::PARAM_STR);
    $query->bindValue(':genre', $movieGenre, PDO::PARAM_INT);
     
    $query->execute();
     
    $idMovie = $pdo->lastInsertId();

    $movie = array(
        "id" => $idMovie, 
        "title" => $movieTitle,
        "cover" => $movieCover, 
        "genre" => $movieGenre
    );

    return $movie;
}

// Mise à jour d'une vidéo
function put_update_movie_by_id($idMovie, $movieTitle, $movieCover, $movieGenre) {
    $query = MySQL::getInstance()->prepare("UPDATE `movies` SET `title` = :title, cover = :cover, genre = :genre WHERE `id` = :id");
    $query->bindValue(':id', $idMovie, PDO::PARAM_INT);
    $query->bindValue(':title', $movieTitle, PDO::PARAM_STR);
    $query->bindValue(':cover', $movieCover, PDO::PARAM_STR);
    $query->bindValue(':genre', $movieGenre, PDO::PARAM_INT);

    return $query->execute();
}

// Suppression d'une vidéo
function delete_movie_by_id($idMovie) {
    $query = MySQL::getInstance()->prepare("DELETE FROM movies WHERE id = :id");
    $query->bindValue(':id', $idMovie, PDO::PARAM_STR);

    return $query->execute();
}

// Liste des genre de vidéos
function get_movies_genres() {
    $query = MySQL::getInstance()->query( "SELECT * FROM genres" );
    return $query->fetchAll( PDO::FETCH_ASSOC );
}