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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $rapportId = $_GET["id"];

    // Récupérer les détails du rapport
    $rapportQuery = "SELECT * FROM Rapport WHERE id = :id";
    $rapportStatement = $dbh->prepare($rapportQuery);
    $rapportStatement->bindParam(':id', $rapportId);
    $rapportStatement->execute();
    $rapport = $rapportStatement->fetch(PDO::FETCH_ASSOC);

    // Récupérer les médicaments offerts dans ce rapport
    $medicamentsQuery = "SELECT Medicament.id, Medicament.nomCommercial, Offrir.quantite
                        FROM Offrir
                        INNER JOIN Medicament ON Offrir.idMedicament = Medicament.id
                        WHERE Offrir.idRapport = :id";
    $medicamentsStatement = $dbh->prepare($medicamentsQuery);
    $medicamentsStatement->bindParam(':id', $rapportId);
    $medicamentsStatement->execute();
    $medicaments = $medicamentsStatement->fetchAll(PDO::FETCH_ASSOC);

    // Afficher le formulaire de modification
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier Rapport</title>
    </head>
    <body>

        <h1>Modifier Rapport</h1>

        <form action="enregistrer_modification.php" method="post">
            <input type="hidden" name="rapport_id" value="<?php echo $rapport['id']; ?>">
            <label for="date">Date :</label>
            <input type="text" name="date" value="<?php echo $rapport['date']; ?>" readonly>
            <br>
            <label for="motif">Motif :</label>
            <input type="text" name="motif" value="<?php echo $rapport['motif']; ?>">
            <br>
            <label for="bilan">Bilan :</label>
            <textarea name="bilan"><?php echo $rapport['bilan']; ?></textarea>
            <br>

            <h2>Médicaments offerts :</h2>
            <?php
            foreach ($medicaments as $medicament) {
                echo "<label for='medicament_{$medicament['id']}'>{$medicament['nomCommercial']} - Quantité :</label>";
                echo "<input type='text' name='medicament[{$medicament['id']}]' value='{$medicament['quantite']}'>";
                echo "<br>";
            }
            ?>

            <input type="submit" value="Enregistrer Modification">
        </form>

    </body>
    </html>

    <?php
} else {
    // Rediriger vers la page principale si l'ID du rapport n'est pas fourni
    header("Location: index.php");
    exit();
}
?>
