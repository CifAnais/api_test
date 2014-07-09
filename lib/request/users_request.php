<?php
/*---- USERS ----*/
function get_users() {
    $query = MySQL::getInstance()->query("SELECT `id`, `username` FROM users");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function get_user_by_id($id) {
    $query = MySQL::getInstance()->prepare(
        "SELECT u.*, COUNT(um.`likes`) as `likes`, COUNT(um.dislikes) as dislikes,COUNT(um.watched) as watch,COUNT(um.watchlist) as watchlist
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