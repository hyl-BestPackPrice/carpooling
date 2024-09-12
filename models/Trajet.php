<?php
class Trajet {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function ajouterTrajet($conducteur_id, $point_depart, $point_arrivee, $date_heure_depart, $places_disponibles, $prix, $description) {
        $sql = "INSERT INTO trajets (conducteur_id, point_depart, point_arrivee, date_heure_depart, places_disponibles, prix, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$conducteur_id, $point_depart, $point_arrivee, $date_heure_depart, $places_disponibles, $prix, $description]);
    }

    public function readAll() {
        $sql = "SELECT * FROM trajets";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    // Ajoutez d'autres méthodes pour lire, mettre à jour et supprimer les trajets
}
?>