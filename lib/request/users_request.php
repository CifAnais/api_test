<?php
/*---- USERS ----*/
// Liste des utilisateurs
function get_users() {
    $query = MySQL::getInstance()->query("SELECT `id`, `username` FROM users");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Profil d'un utilisateur (avec ses likes, dislikes, watched, watchlist)
function get_user_by_id($idUser) {
    $query = MySQL::getInstance()->prepare(
        "SELECT u.*, COUNT(uml.likes) as likes, COUNT(uml.dislikes) as dislikes,COUNT(uml.watched) as watch,COUNT(uml.watchlist) as watchlist
        FROM users AS u
        LEFT JOIN users_movies_liaison AS uml ON u.id = uml.user_id
        WHERE u.id = :id"
    );
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetch(PDO::FETCH_ASSOC);
}

// Création d'un utilisateur
function post_create_user_by_id($idUser, $userName) {
    $query = MySQL::getInstance()->prepare("INSERT INTO users (id, username) VALUES (:id, :username)");
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->bindValue(':username', $userName, PDO::PARAM_STR);

    return $query->execute();
}

// Mise à jour d'un utilisateur
function put_update_user_by_id($idUser, $userName) {
    $query = MySQL::getInstance()->prepare("UPDATE users SET username = :username WHERE id = :id");
    $query->bindValue(':id', $idUser, PDO::PARAM_STR);
    $query->bindValue(':username', $userName, PDO::PARAM_STR);
    
    return $query->execute();
}

// Suppression d'un utilisateur
function delete_user_by_id($idUser) {
    $query = MySQL::getInstance()->prepare("DELETE FROM users WHERE id = :id");
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);

    return $query->execute();
}