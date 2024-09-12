<?php
require_once __DIR__ . '/../models/Utilisateur.php';

class UtilisateurController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function ajouterUtilisateur() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $utilisateur = new Utilisateur($this->db);
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $role = $_POST['role'];

            if ($utilisateur->ajouterUtilisateur($nom, $prenom, $email, $mot_de_passe, $role)) {
                echo "Utilisateur ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout de l'utilisateur.";
            }
        }

        require_once __DIR__ . '/../views/backoffice/utilisateur_manage.php';
    }

    public function afficherTousLesUtilisateurs() {
        $utilisateur = new Utilisateur($this->db);
        $stmt = $utilisateur->readAll();
        require_once __DIR__ . '/../views/backoffice/utilisateur_list.php';
    }
}
?>