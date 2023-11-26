<?php
$userRole = 'medecin'; // Définissez le rôle ici
include '../function.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un nouveau medecin</title>
</head>
<body>
    <a href="..\..\..\..\Gestion_Visite\index.php">Accueil</a>
    <h1>Formulaire d'enregistement <?php echo ucfirst($userRole);?></h1>

    <form action="traitement.php" method="POST">
        <input type="hidden" name="role" value="<?php echo $userRole; ?>">

        <?php
            if(isset($userRole)){
                echo formulaire($userRole);
            }
        ?>

        <input type="submit" value="Valider">
    </form>
</body>
</html>


