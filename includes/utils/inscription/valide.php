<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Visiteur</title>
</head>
<body>
    <header><?php include '../../view/header.php';?></header>
    <h1>Espace Visiteur</h1>

    <?php
        session_start();
        if (isset($_SESSION['prenomVisiteur'], $_SESSION['nomVisiteur'])) {
            $prenomVisiteur = $_SESSION['prenomVisiteur'];
            $nomVisiteur = $_SESSION['nomVisiteur'];
            echo "Bonjour $prenomVisiteur $nomVisiteur";
        } else {
            echo "Informations de session non trouvées.";
        }
    ?>

    
    <ul>
        <li><a href="nouveau_rapport.php">Rédiger un nouveau rapport</a></li>
        <li><a href="date_rapport.php">Modifier un rapport</a></li>
        <li><a href="../medecins/trouver_medecin.php">Trouver un médecin</a></li>
    </ul>
    
    

</body>
</html>
