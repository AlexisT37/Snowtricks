# Snowtricks Docker

Une webapp basée sur [Docker](https://www.docker.com/) pour le framework web [Symfony](https://symfony.com) 6.2 avec PHP 8.2. Snowtricks est une application qui permet de gérer les figures de snowboard, avec des opérations CRUD de figures, l'authentification des utilisateurs et la discussion au travers d'un espace de commentaires.

## Pour commencer

### Prérequis
Pour éviter les messages d'erreur lors du déploiment de l'application, vérifiez que votre php est bien en version 8.2. Pensez surtout à la version de php de vos logiciels d'environnement de développement tels que laragon, wamp, xampp, etc. Si votre projet ne se déploie pas ou si vous avez des erreurs, vérifiez que vous êtes bien en PHP 8.2. et au besoin désactivez les logiciels d'environnement de développement le temps de lancer le projet.

1. [installer Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Rendez-vous dans un dossier vide de votre choix.
3. Ouvrez un terminal (vérifiez que vous êtes dans le dossier que vous venez de créer) et exécutez la commande suivante :
`git clone https://github.com/AlexisT37/Snowtricks.git .`
Cela va cloner le projet dans le dossier.
4. Exécutez la commande `./start.ps1`. Cela va démarrer un script qui va démarrer les conteneurs Docker et installer les dépendances du projet ainsi que les fixtures.
5. Changez la ligne MAILER_DSN dans le fichier .env (ou créez un fichier .env.local) pour que l'envoi d'email fonctionne. Vous pouvez créer un compte sur [Mailtrap](https://mailtrap.io/) pour tester l'envoi d'email. 


## Caractéristiques

* Opérations CRUD Snowtricks pour les figures de snowboard
* Authentification de l'utilisateur et vérification de l'email
* Prise en charge de liens pour des vidéos YouTube et des images
* Commentaires avec pagination
* Système de notifications par email
* Système pour réinitialiser le mot de passe
* PHP 8.2 et Symfony 6.2
* Base de données PostgreSQL Alpine
