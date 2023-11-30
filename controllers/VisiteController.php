<?php
// controllers/VisiteController.php

require_once './models/Visiteurs.php';
require_once './config/database.php';

class VisiteController {

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function afficherPageEspaceVisiteur() {
        include './views/espaceVisiteur.php';
    }

    public function connexionVisiteur(){
        include './views/visite/connexionVisiteur.php';
    }

    public function inscriptionVisiteur() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $motDePasse = $_POST['motDePasse'];
            $codePostal = $_POST['codePostal'];
            $ville = $_POST['ville'];
            $dateEmbauche = $_POST['dateEmbauche'];

            // Assurez-vous de remplacer ces valeurs avec les informations correctes
            $connexion = $this->db->getConnection();
            $visiteur = new Visiteur($connexion);

            $result = $visiteur->enregistrer();

            if ($result) {
                header("Location: router.php?page=connexion-visiteur");
                exit();
            } else {
                $erreurMessage = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
                include './views/visite/inscriptionVisiteur.php';
            }
        } else {
            include './views/visite/inscriptionVisiteur.php';
        }
    }

    // ... (autres méthodes)
}
?>
