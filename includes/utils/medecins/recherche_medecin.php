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

if (isset($_GET['nom'])) {
    $nomMedecin = $_GET['nom'];
    $sql = "SELECT Medecin.id, Personne.nom, Personne.prenom 
            FROM Medecin 
            JOIN Personne ON Medecin.id = Personne.id 
            WHERE Personne.nom LIKE :nomMedecin OR Personne.prenom LIKE :nomMedecin";

    $stmt = $dbh->prepare($sql);
    $nomRecherche = $nomMedecin . "%";
    $stmt->bindParam(':nomMedecin', $nomRecherche);
    $stmt->execute();
    $medecins = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($medecins) {
        foreach ($medecins as $medecin) {
            echo "<div onclick='afficherDetailsMedecin(" . $medecin['id'] . ")' style='cursor: pointer;'>";
            echo htmlspecialchars($medecin['nom']) . " " . htmlspecialchars($medecin['prenom']);
            echo "</div>";
        }
    } else {
        echo "<div>Aucun médecin trouvé.</div>";
    }
}
?>
