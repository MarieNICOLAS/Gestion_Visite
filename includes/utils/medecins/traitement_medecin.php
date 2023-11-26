<?php
// Connexion à la base de données
$host = 'localhost:3306';  // Modifiez avec les détails appropriés
$dbname = 'gestion_visite_db';  // Nom de votre base de données
$username = 'root';  // Votre nom d'utilisateur
$password = '';  // Votre mot de passe

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nomMedecin'])) {
    $nomMedecin = $_POST['nomMedecin'];

    // Préparation de la requête SQL
    $sql = "SELECT Personne.nom, Personne.prenom, Medecin.specialiteComplementaire, Medecin.departement 
            FROM Medecin
            INNER JOIN Personne ON Medecin.id = Personne.id
            WHERE Personne.nom LIKE :nomMedecin";

    $stmt = $dbh->prepare($sql);
    $nomRecherche = "%" . $nomMedecin . "%";
    $stmt->bindParam(':nomMedecin', $nomRecherche);

    // Exécution de la requête
    $stmt->execute();

    // Affichage des résultats
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
