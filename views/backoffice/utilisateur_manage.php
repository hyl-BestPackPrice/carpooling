<h2>Ajouter un Nouvel Utilisateur</h2>
<form action="" method="POST">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom" required><br><br>
    
    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" id="prenom" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br><br>
    
    <label for="mot_de_passe">Mot de Passe:</label>
    <input type="password" name="mot_de_passe" id="mot_de_passe" required><br><br>
    
    <label for="role">Rôle:</label>
    <select name="role" id="role" required>
        <option value="administrateur">Administrateur</option>
        <option value="conducteur">Conducteur</option>
        <option value="passager">Passager</option>
    </select><br><br>
    
    <button type="submit">Ajouter</button>
</form>