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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rapport_id"])) {
    $rapportId = $_POST["rapport_id"];
    $motif = $_POST["motif"];
    $bilan = $_POST["bilan"];

    // Mettre à jour les informations du rapport
    $updateRapportQuery = "UPDATE Rapport SET motif = :motif, bilan = :bilan WHERE id = :id";
    $updateRapportStatement = $dbh->prepare($updateRapportQuery);
    $updateRapportStatement->bindParam(':id', $rapportId);
    $updateRapportStatement->bindParam(':motif', $motif);
    $updateRapportStatement->bindParam(':bilan', $bilan);
    $updateRapportStatement->execute();

    // Mettre à jour les médicaments offerts
    if (isset($_POST["medicament"]) && is_array($_POST["medicament"])) {
        foreach ($_POST["medicament"] as $medicamentId => $quantite) {
            $updateMedicamentQuery = "UPDATE Offrir SET quantite = :quantite WHERE idRapport = :idRapport AND idMedicament = :idMedicament";
            $updateMedicamentStatement = $dbh->prepare($updateMedicamentQuery);
            $updateMedicamentStatement->bindParam(':quantite', $quantite);
            $updateMedicamentStatement->bindParam(':idRapport', $rapportId);
            $updateMedicamentStatement->bindParam(':idMedicament', $medicamentId);
            $updateMedicamentStatement->execute();
        }
    }

    // Rediriger vers la page principale après la modification
    header("Location: valide_change.php");
    exit();
} else {
    // Rediriger vers la page principale si les données ne sont pas fournies
    header("Location: valide_change.php");
    exit();
}
?>
