<?php

require_once __DIR__ . '/../Models/Utilisateur.php';
require_once __DIR__ . '/../Models/Database.php';

class UtilisateurRepository {
    private $DB;

    public function __construct() {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../config.php';
    }

    public function getAllUtilisateurs() {
        $sql = "SELECT * FROM utilisateur;";

        return  $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, Utilisateur::class);
    }

    public function getThisUtilisateurById(int $Id): Utilisateur {
        $sql = 'SELECT * FROM utilisateur WHERE ID = :ID;';

        $statement = $this->DB->prepare($sql);
        $statement->bindValue(':ID', $Id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, Utilisateur::class);
        return $statement->fetch();
    }

    public function getThisUtilisateurByMail($MAIL): Utilisateur {
        $sql = "SELECT * FROM employes WHERE MAIL LIKE :MAIL";

        $statement = $this->DB->prepare($sql);

        $statement->execute([':MAIL' => "%" . $MAIL . "%"]);
        $statement->setFetchMode(PDO::FETCH_CLASS, Utilisateur::class);
        return $statement->fetch();
    }

    public function CreateThisEmploye(Utilisateur $utilisateur): bool {
        $sql = "INSERT INTO utilisateur (prenom, nom, mdp, email, compte_active) VALUES (:prenom, :nom, :mdp, :email, :compte_active);";

        $statement = $this->DB->prepare($sql);

        $success = $statement->execute([
            ':prenom'                 => $utilisateur->getPrenom(),
            ':nom'                    => $utilisateur->getNom(),
            ':mdp'                    => $utilisateur->getMdp(),
            ':email'                  => $utilisateur->getEmail(),
            ':compte_active'          => $utilisateur->getCompteActive()
        ]);

        return $success;
    }
}
