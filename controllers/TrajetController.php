<?php
require_once __DIR__ . '/../models/Trajet.php';

class TrajetController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function ajouterTrajet() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $trajet = new Trajet($this->db);
            $conducteur_id = $_POST['conducteur_id'];
            $point_depart = $_POST['point_depart'];
            $point_arrivee = $_POST['point_arrivee'];
            $date_heure_depart = $_POST['date_heure_depart'];
            $places_disponibles = $_POST['places_disponibles'];
            $prix = $_POST['prix'];
            $description = $_POST['description'];

            if ($trajet->ajouterTrajet($conducteur_id, $point_depart, $point_arrivee, $date_heure_depart, $places_disponibles, $prix, $description)) {
                echo "Trajet ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout du trajet.";
            }
        }

        require_once __DIR__ . '/../views/backoffice/trajet_manage.php';
    }

    public function afficherTousLesTrajets() {
        $trajet = new Trajet($this->db);
        $stmt = $trajet->readAll();
        require_once __DIR__ . '/../views/backoffice/trajet_list.php';
    }
}
?>