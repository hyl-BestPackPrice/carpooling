<?php
// Include the necessary files
require_once __DIR__ . '/../../controllers/ReservationController.php'; // Chemin relatif corrigé
require_once __DIR__ . '/../../config/database.php'; // Chemin relatif corrigé

// Créer une instance PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=covoiturage_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection errors
    echo 'Connexion échouée : ' . $e->getMessage();
    exit;
}

// Créer une instance du contrôleur de réservation
$controller = new ReservationController($pdo);

// Appeler la méthode appropriée pour traiter la réservation
$controller->reserverTrajet();
?>
