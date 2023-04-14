# Snowtricks Docker

Une webapp basée sur [Docker](https://www.docker.com/) pour le framework web [Symfony](https://symfony.com) 6.2 avec PHP 8.2. Snowtricks est une application qui permet de gérer les figures de snowboard, avec des opérations CRUD de figures, l'authentification des utilisateurs et la discussion au travers d'un espace de commentaires.

## Pour commencer

1. [installer Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Exécutez `docker compose build --pull --no-cache` pour construire des images.
3. Lancez `docker compose up -d` pour démarrer les conteneurs.
4. Lancez `docker ps` pour trouver l'ID du conteneur PHP.
4. Lancez `docker exec e5172a3ff42a php bin/console doctrine:fixtures:load --no-interaction` pour charger les données de démonstration, où `e5172a3ff42a` est l'ID du conteneur PHP, pensez à remplacer par votre ID !
4. Ouvrez `localhost` dans votre navigateur favori et [acceptez le certificat TLS auto-généré](https://stackoverflow.com/a/15076602/1352334) ou cliquez sur "accepter les risques et continuer".


## Caractéristiques

* Opérations CRUD Snowtricks pour les figures de snowboard
* Authentification de l'utilisateur et vérification de l'email
* Prise en charge de liens pour des vidéos YouTube et des images
* Commentaires avec pagination
* Système de notifications par email
* Système pour réinitialiser le mot de passe
* PHP 8.2 et Symfony 6.2
* Base de données PostgreSQL Alpine
