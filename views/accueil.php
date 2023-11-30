<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>

    <h1>Accueil</h1>

    <!-- Formulaire avec les boutons d'espace visiteur et médecin -->
    <form action="router.php" method="get">
        <input type="hidden" name="page" value="espace_visiteur">
        <button type="submit">Espace Visiteur</button>
    </form>

    <form action="router.php" method="get">
        <input type="hidden" name="page" value="espace_medecin">
        <button type="submit">Espace Medecin</button>
    </form>

</body>
</html>
