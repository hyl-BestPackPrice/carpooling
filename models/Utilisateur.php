<?php
class Utilisateur {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function ajouterUtilisateur($nom, $prenom, $email, $mot_de_passe, $role) {
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role, date_inscription) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_BCRYPT);
        return $stmt->execute([$nom, $prenom, $email, $mot_de_passe_hache, $role]);
    }

    public function readAll() {
        $sql = "SELECT * FROM utilisateurs";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    // Ajoutez d'autres méthodes pour lire, mettre à jour et supprimer les utilisateurs si nécessaire
}
?>