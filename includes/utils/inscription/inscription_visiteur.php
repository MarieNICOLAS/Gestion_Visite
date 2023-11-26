<?php
$userRole = 'visiteur'; // Définissez le rôle ici
require('../function.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Visiteur</title>
</head>
<body>
    <header><?php include '../../view/header.php';?></header>
    <h1>Inscription</h1>
    <h2>Formulaire d'inscription <?php echo ucfirst($userRole);?></h2>

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


