<?php
/*---- MOVIES ----*/
function get_movies() {
    $query = MySQL::getInstance()->query("SELECT `id`, `title`, `cover`, `genre` FROM movies");

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function get_movie_by_id($id) {
    $query = MySQL::getInstance()->prepare("SELECT `id`, `title`, `cover`, `genre` FROM movies WHERE id=:id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function post_create_movie_by_id($id, $title, $cover, $genre) {
    $query = MySQL::getInstance()->prepare("INSERT INTO movies (id, title, cover, genre) VALUES (:id, :title, :cover, :genre)");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':title', $title, PDO::PARAM_STR);
    $query->bindValue(':cover', $cover, PDO::PARAM_STR);
    $query->bindValue(':genre', $genre, PDO::PARAM_STR);
    return $query->execute();
}

function put_update_movie_by_id($id, $title) {
    $query = MySQL::getInstance()->prepare("UPDATE `movies` SET `title` = :title WHERE `id` = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':title', $title, PDO::PARAM_STR);
    $query->execute();
}

function delete_movie_by_id($id) {
    $query = MySQL::getInstance()->prepare("DELETE FROM movies WHERE id = :id");

    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->execute();
}