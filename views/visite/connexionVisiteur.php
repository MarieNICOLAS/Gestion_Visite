<!-- views/visite/connexionVisiteur.php -->

<!-- ... (autres balises HTML) -->

<form action="router.php?page=gerer_connexion" method="post">
    <!-- Champs pour le formulaire de connexion -->
    <label for="login">Login :</label>
    <input type="text" id="login" name="login" required>
    <br>
    <label for="motDePasse">Mot de passe :</label>
    <input type="password" id="motDePasse" name="motDePasse" required>
    <br>
    <button type="submit">Se connecter</button>
</form>

<!-- ... (autres balises HTML) -->
