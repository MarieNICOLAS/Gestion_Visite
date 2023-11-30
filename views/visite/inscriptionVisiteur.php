<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
</head>
<body>

    <h1>Inscription</h1>

    <form action="router.php?page=inscription-visiteur" method="post">
        <!-- Champs pour le formulaire d'inscription -->
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        <br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
        <br>
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required>
        <br>
        <label for="telephone">Téléphone :</label>
        <input type="tel" id="telephone" name="telephone" required>
        <br>
        <label for="login">Login :</label>
        <input type="email" id="login" name="login" required>
        <br>
        <label for="motDePasse">Mot de passe :</label>
        <input type="password" id="motDePasse" name="motDePasse" required>
        <br>
        <label for="codePostal">Code Postal :</label>
        <input type="text" id="codePostal" name="codePostal" required>
        <br>
        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="ville" required>
        <br>
        <label for="dateEmbauche">Date d'embauche :</label>
        <input type="date" id="dateEmbauche" name="dateEmbauche" required>
        <br>
        <button type="submit">S'inscrire</button>
    </form>

</body>
</html>
