<?php
// Connexion à la base de données
$host = 'localhost:3306';  // Veuillez ajuster ces variables en fonction de votre configuration
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
    $idMedecin = $_GET['id'];

    // Préparation de la requête SQL pour obtenir les détails du médecin
    $sql = "SELECT Medecin.id, Personne.nom, Personne.prenom, Medecin.specialiteComplementaire, Medecin.departement, Medecin.email 
            FROM Medecin 
            JOIN Personne ON Medecin.id = Personne.id 
            WHERE Medecin.id = :id";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $idMedecin);
    $stmt->execute();
    $medecin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($medecin) {
        // Affichage des détails du médecin
        echo "<h3>Détails du Médecin</h3>";            
        echo "<ul>";    
        echo "<li>Nom: " . htmlspecialchars($medecin['nom']) . " " . htmlspecialchars($medecin['prenom']) . "</li>";
        echo "<li>Spécialité Complémentaire: " . htmlspecialchars($medecin['specialiteComplementaire']) . "</li>";
        echo "<li>Département: " . htmlspecialchars($medecin['departement']) . "</li>";
        echo "<li>Email: <a target='_blank' href='mailto:" . htmlspecialchars($medecin['email']) . "'>" . htmlspecialchars($medecin['email']) . "</a></li>";
        echo "</ul>";
    } else {
        echo "<div>Aucun médecin trouvé.</div>";
    }
}
?>