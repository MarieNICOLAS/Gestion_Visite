<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace visiteur | Trouver un médecin</title>
    <style>
        #resultats { float: right; width: 30%; margin-right: 20px; }
        #detailsMedecin { float: right; width: 70%; }
    </style>
    <script>
        function rechercherMedecin() {
            var saisie = document.getElementById('nomMedecin').value;
            if (saisie.length > 0) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('resultats').innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "recherche_medecin.php?nom=" + saisie, true);
                xmlhttp.send();
            } else {
                document.getElementById('resultats').innerHTML = "";
                document.getElementById('detailsMedecin').innerHTML = "";
            }
        }

        function afficherDetailsMedecin(idMedecin) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('detailsMedecin').innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "trouver_medecin.php?id=" + idMedecin, true);
            xmlhttp.send();
        }
    </script>
</head>
<body>

    <h1>Trouver un médecin</h1>

    <input type="text" id="nomMedecin" onkeyup="rechercherMedecin()" placeholder="Entrez un nom de médecin">
    <div id="resultats"></div>
    <div id="detailsMedecin"></div>

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

</body>
</html>

gestionnaire_visites/
    index.php
    includes/
        classes/
            classe.php
        sql/
            requete_sql.sql
        view/
            header.php
            footer.php
        utils/
            function.php
            medecins/
                trouver_medecin.php
                details_medecins.php
                modifier_medecin.php
                recherche_medecin.php
                traitement_medecin.php
            inscription/
                connexion_visiteur.php
                date_rapport.php
                enregistrer_modification.php
                espace_medecin.php
                espace_visiteur.php
                inscription_visiteur.php
                inscription_medecin.php
                modifier_rapport.php
                nouveau_rapport.php
                rapport_valide.php
                traitement_connexion.php
                traitement_rapport.php
                traitement.php
                valide_change.php
                valide.php
