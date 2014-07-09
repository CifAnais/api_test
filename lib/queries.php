<?php
/*---- USERS ----*/
function get_users() {
    $query = MySQL::getInstance()->query("SELECT `id`, `username` FROM users");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function get_user_by_id($id) {
    $query = MySQL::getInstance()->prepare(
        "SELECT u.*, COUNT(um.`likes`) as `likes`, COUNT(um.dislikes) as dislikes,COUNT(um.watch) as watch,COUNT(um.watchlist) as watchlist
        FROM users AS u
        LEFT JOIN `users_movies_liaison` AS um ON u.id = um.user_id
        WHERE u.id = :id"
    );
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetch(PDO::FETCH_ASSOC);
}

function post_create_user_by_id($id, $username) {
    $query = MySQL::getInstance()->prepare("INSERT INTO users (id, username) VALUES (:id, :username)");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    return $query->execute();
}

function put_update_user_by_id($id, $username) {
    $query = MySQL::getInstance()->prepare("UPDATE `users` SET `username` = :username WHERE `id` = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->execute();
}

function delete_user_by_id($id) {
    $query = MySQL::getInstance()->prepare("DELETE FROM users WHERE id = :id");

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
}

//UPDATE `api_galissot`.`users` SET `username` = 'Hey' WHERE `users`.`id` =9;

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