<h2>Ajouter un Nouveau Trajet</h2>
<form action="" method="POST">
    <label for="conducteur_id">ID du Conducteur:</label>
    <input type="text" name="conducteur_id" id="conducteur_id" required><br><br>
    
    <label for="point_depart">Point de Départ:</label>
    <input type="text" name="point_depart" id="point_depart" required><br><br>
    
    <label for="point_arrivee">Point d'Arrivée:</label>
    <input type="text" name="point_arrivee" id="point_arrivee" required><br><br>
    
    <label for="date_heure_depart">Date et Heure de Départ:</label>
    <input type="datetime-local" name="date_heure_depart" id="date_heure_depart" required><br><br>
    
    <label for="places_disponibles">Places Disponibles:</label>
    <input type="number" name="places_disponibles" id="places_disponibles" required><br><br>
    
    <label for="prix">Prix:</label>
    <input type="number" name="prix" id="prix" required><br><br>
    
    <label for="description">Description:</label>
    <input type="text" name="description" id="description" required><br><br>
    
    <button type="submit">Ajouter</button>
</form>