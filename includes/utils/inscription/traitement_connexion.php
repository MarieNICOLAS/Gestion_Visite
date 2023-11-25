<?php
// Vérifie si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = isset($_POST['login']) ? $_POST['login'] : null;
    $motDePasse = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : null;

    // Connexion à la base de données
    $host = 'localhost:3306';
    $dbname = 'gestion_visite_db';
    $username = 'root';
    $password = 'password';

    try {
        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour vérifier les informations de connexion
        $sql = "SELECT Personne.id, Personne.prenom, Personne.nom FROM Visiteur 
                JOIN Personne ON Visiteur.id = Personne.id
                WHERE Visiteur.login = :login AND Visiteur.motDePasse = :motDePasse";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':motDePasse', $motDePasse);
        $stmt->execute();

        // Vérifie si les identifiants sont valides
        if ($stmt->rowCount() > 0) {
            // Connexion réussie, démarrer la session et stocker les informations dans des variables de session
            session_start();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['idVisiteur'] = $row['id'];
            $_SESSION['prenomVisiteur'] = $row['prenom'];
            $_SESSION['nomVisiteur'] = $row['nom'];
            header("Location: valide.php");
            exit();
        } else {
            echo "Identifiants incorrects. Veuillez réessayer.";
        }
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
?>
