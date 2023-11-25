<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Visiteur</title>
</head>
<body>
    <a href="..\..\..\..\Gestion_Visite\index.php">Accueil</a>
    <h1>Connexion Visiteur</h1>

    <!-- Formulaire de Connexion -->
    <form action="traitement_connexion.php" method="post">
        <!-- Champ Login -->
        <label for="login">Email :</label>
        <input type="text" id="login" name="login" required>

        <!-- Champ Mot de Passe -->
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>

        <!-- Bouton de Connexion -->
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
