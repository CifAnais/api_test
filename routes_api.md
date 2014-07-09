# Utilisateurs

* /users/:id + PUT -> Mettre à jour un utilisateur
* /users/:id/likes -> liste des films qu'on aime
* /users/:id/likes/:movie_id + post -> aimer un film
* /users/:id/likes/:movie_id + delete -> ne plus aimer un film
* /users/:id/dislikes -> liste des films qu'on aime pas
* /users/:id/dislikes/:movie_id + post -> ne pas aimer un film
* /users/:id/dislikes/:movie_id + delete -> supprimer avis negatif du film
* /users/:id/watched -> liste des films qu'on a vu
* /users/:id/watched/:movie_id + post -> ajouter un film vu
* /users/:id/watched/:movie_id + delete -> supprimer un film vu
* /users/:id/watchlist -> liste des films qu'on a pas vu
* /users/:id/watchlist/:movie_id + post -> ajouter un film a voir
* /users/:id/watchlist/:movie_id + delete -> supprimer un film a voir

---

# movies

* /movies/:id + PUT -> Mettre à jour un film

---

# plus 

* /search?q=:recherche&type=movies|users -> recherche
* /users/:id/follow/:id + post -> suivre un utilisateur
* /users/:id/follow/:id + delete -> ne plus suivre un utilisateur
* /users/:id/follow -> les users suivis par l'utilisateur
* /users/:id/followers -> les users qui nous suivent


FAIT :
# Utilisateurs

* /users -> liste des utilisateurs == OK
* /users + POST -> créer un utilisateur == OK
* /users/:id -> voir le profil d'un utilisateur == OK
* /users/:id + DELETE -> Supprimer un utilisateur == OK

---

# movies

* /movies -> liste des films  == OK
* /movies + POST -> créer un film == OK
* /movies/:id -> voir la fiche d'un film == OK
* /movies/:id + DELETE -> Supprimer un film == OK