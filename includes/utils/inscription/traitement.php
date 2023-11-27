<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement des données</title>
</head>
<body>
    <header><a href="../../index.php"></a></header>
<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurez-vous que d'autres champs du formulaire sont également définis ici
    $userRole = $_POST['role'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $login = $_POST['email'];
    $motDePasse = $_POST['motDePasse'];

    // Connectez-vous à la base de données
    $host = 'localhost:3306';
    $dbname = 'gestion_visite_db';
    $username = 'root';
    $password = '';

    try {
        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insérez les données dans la table Personne
        $sql = "INSERT INTO Personne (nom, prenom, adresse, telephone) VALUES (:nom, :prenom, :adresse, :telephone)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->execute();

        // Récupérez l'ID de la personne insérée
        $personneId = $dbh->lastInsertId();

        if ($userRole === 'visiteur') {
            // Si c'est un visiteur, insérez les données dans la table Visiteur
            $codePostal = $_POST['codePostal'];
            $ville = $_POST['ville'];
            //$dateEmbauche = $_POST['dateEmbauche'];
                //rajouter date embauche   $sql = "INSERT INTO Visiteur (id, login, motDePasse, codePostal, ville, dateEmbauche) VALUES (:id, :login, :motDePasse, :codePostal, :ville, :dateEmbauche)";
            $sql = "INSERT INTO Visiteur (id, login, motDePasse, codePostal, ville) VALUES (:id, :login, :motDePasse, :codePostal, :ville)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $personneId);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':motDePasse', $motDePasse);
            $stmt->bindParam(':codePostal', $codePostal);
            $stmt->bindParam(':ville', $ville);
           // $stmt->bindParam(':dateEmbauche', $dateEmbauche);
            $stmt->execute();
        } elseif ($userRole === 'medecin') {
            // Si c'est un médecin, insérez les données dans la table Medecin
            $specialiteComplementaire = $_POST['specialiteComplementaire'];
            $departement = $_POST['departement'];
            $email = $_POST['email'];

            $sql = "INSERT INTO Medecin (id, specialiteComplementaire, departement, email) VALUES (:id, :specialiteComplementaire, :departement, :email)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $personneId);
            $stmt->bindParam(':specialiteComplementaire', $specialiteComplementaire);
            $stmt->bindParam(':departement', $departement);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
        }

        echo "Enregistrement réussi dans la base de données.";
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
?>

<a href="inscription_medecin.php"><br>Ajouter un autre médecin</a>

</body>
</html>
