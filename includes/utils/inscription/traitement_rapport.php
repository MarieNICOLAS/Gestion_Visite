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

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['prenomVisiteur'], $_SESSION['nomVisiteur'])) {
    header("Location: connexion.php"); // Redirige l'utilisateur vers la page de connexion
    exit();
}

// Récupérez les données du formulaire
$idMedecin = isset($_POST['medecin']) ? $_POST['medecin'] : null;
$date = isset($_POST['date']) ? $_POST['date'] : null;
$motif = isset($_POST['motif']) ? $_POST['motif'] : null;
$bilan = isset($_POST['bilan']) ? $_POST['bilan'] : null;
$idMedicament = isset($_POST['medicament']) ? $_POST['medicament'] : null;
$quantite = isset($_POST['quantite']) ? $_POST['quantite'] : null;

// Enregistrez le rapport dans la table Rapport
$sqlInsertRapport = "INSERT INTO Rapport (date, idVisiteur, idMedecin, motif, bilan) 
                    VALUES (:date, :idVisiteur, :idMedecin, :motif, :bilan)";
$stmtInsertRapport = $dbh->prepare($sqlInsertRapport);
$stmtInsertRapport->bindParam(':date', $date);
$stmtInsertRapport->bindParam(':idVisiteur', $_SESSION['idVisiteur']);
$stmtInsertRapport->bindParam(':idMedecin', $idMedecin);
$stmtInsertRapport->bindParam(':motif', $motif);
$stmtInsertRapport->bindParam(':bilan', $bilan);
$stmtInsertRapport->execute();
$idRapport = $dbh->lastInsertId(); // Récupérez l'ID du rapport inséré

// Enregistrez le médicament offert dans la table Offrir
if (!empty($idMedicament)) {
    $sqlInsertOffrir = "INSERT INTO Offrir (idRapport, idMedicament, quantite) 
                        VALUES (:idRapport, :idMedicament, :quantite)";
    $stmtInsertOffrir = $dbh->prepare($sqlInsertOffrir);
    $stmtInsertOffrir->bindParam(':idRapport', $idRapport);
    $stmtInsertOffrir->bindParam(':idMedicament', $idMedicament);
    $stmtInsertOffrir->bindParam(':quantite', $quantite);
    $stmtInsertOffrir->execute();
}


header("Location: rapport_valide.php?idRapport=$idRapport");
exit();
?>
