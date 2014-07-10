<?php
/*---- FOLLOW ----*/
// Liste des utilisateurs suivis par l'utilisateur
function get_followed_user($idUser) {
    $query = MySQL::getInstance()->prepare(
        "SELECT u.* 
        FROM users AS u
        LEFT JOIN `follow` AS f ON u.id = f.followed_id
        WHERE f.follower_id = :id"
    );
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Suivre un utilisateur
function post_followed_user($idUser, $idUserASuivre) {
    $query = MySQL::getInstance()->prepare("INSERT INTO follow (follower_id, followed_id) VALUES (:idUser, :idUserASuivre)");
    $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idUserASuivre', $idUserASuivre, PDO::PARAM_INT);
    
    return $query->execute();
}

// Ne plus suivre un utilisateur
function delete_followed_user($idUser, $idUserASuivre) {
    $query = MySQL::getInstance()->prepare("DELETE FROM follow WHERE follower_id=:idUser and followed_id=:idUserASuivre"); 
    $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idUserASuivre', $idUserASuivre, PDO::PARAM_INT);
   
    return $query->execute();
}

// Liste des utilisateurs qui suivent un utilisateur
function get_followers_user($idUser) {
    $query = MySQL::getInstance()->prepare(
        "SELECT u.* 
        FROM users AS u
        LEFT JOIN `follow` AS f ON u.id = f.follower_id
        WHERE f.followed_id = :id"
    );
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
    
    return $query->fetchAll(PDO::FETCH_ASSOC);
}