# Application Gestion des Apprenants

L'objectif de ce projet est de créer une application de gestion des élèves, qui permettra de gérer les absences et les retards. 

## Installation

Lors de l'installation, veuillez renseigner dans le fichier config.php situé dans le dossier `src`, les bonnes informations relatives à la base de données.  

`DB_HOST`: Endroit où est stockée la base de données ("localhost" si votre base de données est en local)  
`DB_NAME`: Nom de la base de données  
`DB_USER`: Nom d'utilisateur pour se connecter à la base de données  
`DB_PWD`: Mot de passe de l'utilisateur  
`HOME_URL`: Url de la page d'accueil  

## Migration

Pour la migration, importez le fichier `gestionapprenants.sql` situé dans `src/Migrations` dans votre base de données MySQL.  

Si vous souhaitez faire des modifications avant la création de la base de données, c'est dans ce fichier que vous devez modifier les choses.  

## Objectifs du projet

Créer un site responsive  
Gérer un backend avec MVC, qui communiquera avec le front sous format d'API, en JSON  
Permettre au front, construit en SPA, de récupérer et interagir avec le back, en asynchrone  
Gérer une base de données  
Construire les composants d'accès aux données à la main  
Déployer votre application sur le serveur de Simplon  
Faire des tests en développement  
Proposer un gitflow précis et construit  
Donner une documentation de déploiement et de suivi de projet  

Projet à réaliser seul sur 8 jours et demi.