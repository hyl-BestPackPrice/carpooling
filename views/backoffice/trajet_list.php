<h2>Liste des Trajets</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Conducteur ID</th>
            <th>Point de Départ</th>
            <th>Point d'Arrivée</th>
            <th>Date et Heure de Départ</th>
            <th>Places Disponibles</th>
            <th>Prix</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['conducteur_id']); ?></td>
                <td><?php echo htmlspecialchars($row['point_depart']); ?></td>
                <td><?php echo htmlspecialchars($row['point_arrivee']); ?></td>
                <td><?php echo htmlspecialchars($row['date_heure_depart']); ?></td>
                <td><?php echo htmlspecialchars($row['places_disponibles']); ?></td>
                <td><?php echo htmlspecialchars($row['prix']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<a href="/covoiturage_project/index.php?action=trajet_manage">Ajouter un Nouveau Trajet</a>