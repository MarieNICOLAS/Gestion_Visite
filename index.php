<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Application - Gestion de visites médicales</title>
        </head>
    <body>
        <header><?php include('includes/view/header.php'); ?></header>
        <h1>Accueil</h1>    

        <ul>
            <li><a href="\Gestion_Visite\includes\utils\inscription\espace_visiteur.php">Espace Visiteur</a></li>
            <li><a href="\Gestion_Visite\includes\utils\inscription\espace_medecin.php">Espace Médecin</a></li>
        </ul>
    </body>
</html>

<?php
     // Configuration de la connexion à la base de données
     $host = 'localhost'; // Adresse du serveur de base de données
     $dbname = 'gestion_visite_db'; // Nom de la base de données
     $username = 'root'; // Nom d'utilisateur de la base de données
     $password = 'password'; // Mot de passe de la base de données
    
    try {
        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Définir l'attribut PDO pour afficher les erreurs (utile pour le débogage)
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connexion à la base de données établie avec succès.";
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
?>