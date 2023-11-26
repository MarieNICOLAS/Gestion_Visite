<?php
session_start();

// Connexion à la base de données
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

require('./traitement_connexion.php');

// Récupérer la liste des médecins depuis la base de données
$sqlMedecins = "SELECT Personne.id, Personne.nom FROM Medecin
                JOIN Personne ON Medecin.id = Personne.id";

$stmtMedecins = $dbh->prepare($sqlMedecins);
$stmtMedecins->execute();
$medecins = $stmtMedecins->fetchAll(PDO::FETCH_ASSOC);

// Récupérer la liste des médicaments depuis la base de données
$sqlMedicaments = "SELECT id, nomCommercial FROM Medicament";
$stmtMedicaments = $dbh->prepare($sqlMedicaments);
$stmtMedicaments->execute();
$medicaments = $stmtMedicaments->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Rapport de Visite</title>
</head>
<body>
    <header><?php include '../../view/header.php';?></header>
    <h1>Nouveau Rapport de Visite</h1>

    <form action="traitement_rapport.php" method="POST">
        
        <label for="medecin">Sélectionnez un médecin :</label>
        <select id="medecin" name="medecin" required>
            <?php foreach ($medecins as $medecin) : ?>
                <option value="<?php echo $medecin['id']; ?>"><?php echo $medecin['nom']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        
        <label for="medicament">Sélectionnez un médicament :</label>
        <select id="medicament" name="medicament" required>
            <?php foreach ($medicaments as $medicament) : ?>
                <option value="<?php echo $medicament['id']; ?>"><?php echo $medicament['nomCommercial']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="quantite">Quantité (en mg):</label>
        <input type="number" id="quantite" name="quantite"  max="2000" required>
        <br>

        
        <label for="date">Date :</label>
        <input type="date" id="date" name="date" required>
        <br>

        
        <label for="motif">Motif de visite :</label>
        <input type="text" id="motif" name="motif" required>
        <br>

        
        <label for="bilan">Bilan de visite :</label>
        <textarea id="bilan" name="bilan" rows="4" required></textarea>

        <br>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
