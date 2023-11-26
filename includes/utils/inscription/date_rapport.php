<?php

$host = 'localhost:3306';
$dbname = 'gestion_visite_db';
$username = 'root';
$password = 'password';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

// Requête SQL pour récupérer les dates des rapports
$query = "SELECT DISTINCT date FROM Rapport";
$statement = $dbh->query($query);
$dates = $statement->fetchAll(PDO::FETCH_COLUMN);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Dates de Rapports</title>
</head>
<body>

    <h1>Liste des Dates de Rapports</h1>

    <form action="" method="post">
        <label for="date">Sélectionner la date du rapport à afficher :</label>
        <select name="date" id="date">
            <?php
            foreach ($dates as $date) {
                echo "<option value=\"$date\">$date</option>";
            }
            ?>
        </select>
        <input type="submit" value="Afficher">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedDate = $_POST["date"];
        // Afficher les rapports pour la date sélectionnée
        $rapportQuery = "SELECT * FROM Rapport WHERE date = :date";
        $rapportStatement = $dbh->prepare($rapportQuery);
        $rapportStatement->bindParam(':date', $selectedDate);
        $rapportStatement->execute();
        $rapports = $rapportStatement->fetchAll(PDO::FETCH_ASSOC);

        // Afficher les rapports
        echo "<h2>Rapports créés le $selectedDate :</h2>";
        echo "<ul>";
        foreach ($rapports as $rapport) {
            echo "<li>Motif: {$rapport['motif']}, Bilan: {$rapport['bilan']} ";
            echo "<a href='modifier_rapport.php?id={$rapport['id']}'>Modifier</a></li>";
        }
        echo "</ul>";
    }
    ?>

</body>
</html>
