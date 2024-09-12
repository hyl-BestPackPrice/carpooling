<?php
require_once __DIR__ . '/../models/Reservation.php'; // Assurez-vous que le chemin est correct
require_once __DIR__ . '/../config/database.php'; // Assurez-vous que le chemin est correct

class ReservationController {
    private $reservation;
    private $pdo;

    public function __construct($pdo) {
        $this->reservation = new Reservation($pdo);
        $this->pdo = $pdo;
    }

    public function afficherFormulaire() {
        // Inclure le formulaire de réservation
        include __DIR__ . '/../views/frontoffice/reservation_form.php';
    }

    public function creer() {
        // Appeler le traitement de la réservation
        $this->traiterReservation();
    }

    public function reserverTrajet() {
        // Appeler le traitement de la réservation
        $this->traiterReservation();
    }

    private function traiterReservation() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $trajet_id = isset($_POST['trajet_id']) ? intval($_POST['trajet_id']) : 0;
            $passager_id = isset($_POST['passager_id']) ? intval($_POST['passager_id']) : 0;
            $date_reservation = isset($_POST['date_reservation']) ? htmlspecialchars($_POST['date_reservation']) : '';

            if ($trajet_id > 0 && $passager_id > 0 && !empty($date_reservation)) {
                $result = $this->reservation->ajouterReservation($trajet_id, $passager_id, $date_reservation);
                if ($result) {
                    header('Location: ../views/frontoffice/reservation_success.php');
                    exit();
                } else {
                    echo "Erreur lors de l'ajout de la réservation.";
                }
            } else {
                echo "Données de réservation invalides.";
            }
        } else {
            $this->afficherFormulaire();
        }
    }

    public function lireTous() {
        try {
            $sql = "SELECT * FROM reservations";
            $stmt = $this->pdo->query($sql);
            $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            include '../views/reservations/liste.php';
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des réservations : " . $e->getMessage();
        }
    }

    public function lireUn($id) {
        try {
            $sql = "SELECT * FROM reservations WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($reservation) {
                include '../views/reservations/detail.php';
            } else {
                echo "Réservation non trouvée.";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de la réservation : " . $e->getMessage();
        }
    }
}
?>
