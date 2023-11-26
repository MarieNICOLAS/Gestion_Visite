<?php
// Nouvelle page PHP

// Démarrer la session
session_start();

// Vérifier si les informations de session existent
if (isset($_SESSION['prenomVisiteur'], $_SESSION['nomVisiteur'])) {
    $prenomVisiteur = $_SESSION['prenomVisiteur'];
    $nomVisiteur = $_SESSION['nomVisiteur'];
    echo "Bonjour $prenomVisiteur $nomVisiteur";
} else {
    echo "Informations de session non trouvées.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="nouveau_rapport.php">Nouveau rapport</a>
    <br>
    <a href="date_rapport.php">Modifier un rapport</a>
</body>
</html>
