<?php

$host = 'localhost:3306';
$dbname = 'gestion_visite_db';
$username = 'root';
$password = '';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}


if (isset($_GET['id'])) {
    $medecinId = $_GET['id'];

    $sql = "SELECT Medecin.id, Personne.nom, Personne.prenom, Medecin.specialiteComplementaire, Medecin.departement 
            FROM Medecin 
            JOIN Personne ON Medecin.id = Personne.id 
            WHERE Medecin.id = :id";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $medecinId);
    $stmt->execute();
    $medecin = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$medecin) {
        die("Médecin non trouvé.");
    }
} else {
    die("Aucun ID de médecin spécifié.");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Médecin</title>
</head>
<body>
    <header><?php include '../../view/header.php';?></header>
    <form action="traitement_modification_medecin.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $medecin['id']; ?>">
        
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo $medecin['nom']; ?>" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $medecin['prenom']; ?>" required><br>

        <label for="specialiteComplementaire">Spécialité Complémentaire :</label>
        <input type="text" id="specialiteComplementaire" name="specialiteComplementaire" value="<?php echo $medecin['specialiteComplementaire']; ?>"><br>

        <label for="departement">Département :</label>
        <input type="text" id="departement" name="departement" value="<?php echo $medecin['departement']; ?>"><br>

        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
