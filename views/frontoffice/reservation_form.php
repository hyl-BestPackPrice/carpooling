<?php
// Inclure la connexion à la base de données
require_once __DIR__ . '/../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $trajet_id = htmlspecialchars(strip_tags($_POST['trajet_id']));
    $date_reservation = htmlspecialchars(strip_tags($_POST['date_reservation']));

    // Valider les données
    if (!empty($trajet_id) && !empty($date_reservation)) {
        try {
            // Préparer la requête d'insertion
            $query = "INSERT INTO reservations (trajet_id, date_reservation) VALUES (:trajet_id, :date_reservation)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':trajet_id', $trajet_id);
            $stmt->bindParam(':date_reservation', $date_reservation);

            // Exécuter la requête
            if ($stmt->execute()) {
                echo "Réservation ajoutée avec succès.";
            } else {
                echo "Erreur lors de l'ajout de la réservation.";
            }
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}

// Afficher le formulaire
?>

<h2>Formulaire de Réservation</h2>
<form action="" method="POST">
    <label for="trajet_id">Trajet:</label>
    <select name="trajet_id" id="trajet_id" required>
        <?php
        try {
            // Récupérer les trajets disponibles
            $result = $pdo->query("SELECT id, description FROM trajets");
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['description']) . "</option>";
                }
            } else {
                echo "<option value=''>Aucun trajet disponible</option>";
            }
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage();
        }
        ?>
    </select><br><br>

    <label for="date_reservation">Date de Réservation:</label>
    <input type="date" name="date_reservation" id="date_reservation" required><br><br>

    <button type="submit">Réserver</button>
</form>