<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Visiteur</title>
</head>
<body>
    <?php include '../../view/header.php';?>
    <h1>Connexion Visiteur</h1>

    
    <form action="traitement_connexion.php" method="post">
        
        <label for="login">Email :</label>
        <input type="text" id="login" name="login" required>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
