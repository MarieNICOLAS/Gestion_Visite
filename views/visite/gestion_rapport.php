<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Visiteur</title>
</head>
<body>

    <h1>Bienvenue dans l'Espace Visiteur</h1>

    <!-- Bouton pour ajouter un rapport -->
    <form action="router.php" method="get">
        <input type="hidden" name="page" value="ajouter_rapport">
        <button type="submit">Ajouter un rapport</button>
    </form>

    <!-- Bouton pour modifier un rapport -->
    <form action="router.php" method="get">
        <input type="hidden" name="page" value="modifier_rapport">
        <button type="submit">Modifier un rapport</button>
    </form>

</body>
</html>
