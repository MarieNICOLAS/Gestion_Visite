<!-- views/espace_visiteur.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Visiteur</title>
</head>
<body>

    <h1>Bienvenue dans l'Espace Visiteur</h1>

    <form action="router.php" method="get">
        <input type="hidden" name="page" value="connexion-visiteur">
        <button type="submit">connexion</button>
    </form>

    <form action="router.php" method="get">
        <input type="hidden" name="page" value="inscription-visiteur">
        <button type="submit">inscription</button>
    </form>


</body>
</html>
