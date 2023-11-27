<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Medecin</title>
</head>
<body>
    <header><?php include '../../view/header.php';?></header>
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


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nomMedecin'])) {
    $nomMedecin = $_POST['nomMedecin'];

    
    $sql = "SELECT Personne.nom, Personne.prenom, Medecin.specialiteComplementaire, Medecin.departement 
            FROM Medecin
            INNER JOIN Personne ON Medecin.id = Personne.id
            WHERE Personne.nom LIKE :nomMedecin";

    $stmt = $dbh->prepare($sql);
    $nomRecherche = "%" . $nomMedecin . "%";
    $stmt->bindParam(':nomMedecin', $nomRecherche);

    
    $stmt->execute();

    
    $medecins = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($medecins) {
        echo "<h2>Résultats de la recherche :</h2>";
        echo "<ul>";
        foreach ($medecins as $medecin) {
            echo "<li>Nom: {$medecin['nom']} {$medecin['prenom']}, Spécialité: {$medecin['specialiteComplementaire']}, Département: {$medecin['departement']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucun médecin trouvé avec le nom '$nomMedecin'.</p>";
    }
}
?>
    
</body>
</html>

