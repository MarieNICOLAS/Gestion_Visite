<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace visiteur | Trouver un médecin</title>
</head>
<body>
    <header><?php include '../../view/header.php';?></header>
    <h1>Trouver un médecin</h1>

    <form action="traitement_medecin.php" method="POST">
        <label for="nomMedecin">Nom du Médecin :</label>
        <input type="text" id="nomMedecin" name="nomMedecin" required>
        <input type="submit" value="Rechercher">
    </form>

</body>
</html>

