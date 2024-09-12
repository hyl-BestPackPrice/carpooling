<?php
require_once 'config/database.php'; 
require_once 'controllers/ReservationController.php'; 
require_once 'controllers/TrajetController.php'; 
require_once 'controllers/UtilisateurController.php'; 

// Créer une instance PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=covoiturage_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    exit;
}

// Créer une instance du contrôleur en passant l'objet PDO
$reservationController = new ReservationController($pdo);
$trajetController = new TrajetController($pdo);
$utilisateurController = new UtilisateurController($pdo);

// Récupérer l'action depuis l'URL
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Appeler la méthode appropriée sur le contrôleur
switch ($action) {
    case 'creer':
        $reservationController->creer();
        break;
    case 'lireTous':
        $reservationController->lireTous();
        break;
    case 'lireUn':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $reservationController->lireUn($id);
        break;
    case 'trajet_manage':
        $trajetController->ajouterTrajet();
        break;
    case 'trajet_list':
        $trajetController->afficherTousLesTrajets();
        break;
    case 'utilisateur_manage':
        $utilisateurController->ajouterUtilisateur();
        break;
    case 'utilisateur_list':
        $utilisateurController->afficherTousLesUtilisateurs();
        break;
    default:
        $reservationController->afficherFormulaire();
        break;
}
?>