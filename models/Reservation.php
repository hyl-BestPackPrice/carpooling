<?php
class Reservation {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function ajouterReservation($trajet_id, $passager_id, $date_reservation) {
        $sql = "INSERT INTO reservations (trajet_id, passager_id, date_reservation, statut) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$trajet_id, $passager_id, $date_reservation, 'En attente']);
    }

    // Ajoutez d'autres méthodes pour lire, mettre à jour et supprimer les réservations
}
?>
