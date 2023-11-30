<?php
// controllers/MedecinController.php

//require_once '../models/Medecin.php';  // Assurez-vous d'ajuster le chemin selon votre structure
//require_once '../models/RapportVisite.php';  // Assurez-vous d'ajuster le chemin selon votre structure

class MedecinController {

    public function afficherPageEspaceMedecin() {
        // Logique pour l'espace médecin
        // ...

        // Affichage de la vue de l'espace médecin
        include './views/espaceMedecin.php';
    }
    // Méthode pour afficher les informations d'un médecin
    public function afficherInformations() {
        // Logique pour récupérer les informations du médecin
        // Exemple: récupération de l'ID du médecin depuis les paramètres de l'URL
        $medecinId = $_GET['id'];

        // Exemple: récupération des informations du médecin depuis la base de données
        $informationsMedecin = Medecin::getInformationsMedecin($medecinId);

        // Affichage de la vue d'informations avec les données nécessaires
        include '../views/medecin/informations.php';  // Assurez-vous d'ajuster le chemin selon votre structure
    }

    // Méthode pour afficher le formulaire de modification des informations d'un médecin
    public function afficherFormulaireModification() {
        // Logique pour récupérer les informations du médecin à modifier
        // Exemple: récupération de l'ID du médecin depuis les paramètres de l'URL
        $medecinId = $_GET['id'];

        // Exemple: récupération des informations du médecin depuis la base de données
        $informationsMedecin = Medecin::getInformationsMedecin($medecinId);

        // Affichage de la vue de modification avec les données nécessaires
        include '../views/medecin/modifier.php';  // Assurez-vous d'ajuster le chemin selon votre structure
    }

    // Méthode pour enregistrer les modifications des informations d'un médecin
    public function enregistrerModification() {
        // Logique de validation et enregistrement des modifications dans la base de données
        // Exemple: récupération des données du formulaire
        $medecinId = $_POST['medecin_id'];
        $specialiteComplementaire = $_POST['specialite_complementaire'];
        $departement = $_POST['departement'];

        // Exemple: récupération du médecin depuis la base de données
        $medecin = Medecin::getMedecinById($medecinId);

        // Exemple: mise à jour des informations du médecin
        $medecin->setSpecialiteComplementaire($specialiteComplementaire);
        $medecin->setDepartement($departement);

        // Exemple: enregistrement des modifications dans la base de données
        $medecin->enregistrerModification();

        // Redirection ou affichage d'un message de succès
    }

    // Méthode pour afficher l'historique des rapports de visite pour un médecin
    public function afficherHistorique() {
        // Logique pour récupérer l'historique des rapports de visite pour un médecin
        // Exemple: récupération de l'ID du médecin depuis les paramètres de l'URL
        $medecinId = $_GET['id'];

        // Exemple: récupération de l'historique des rapports de visite depuis la base de données
        $historiqueRapports = RapportVisite::getHistoriqueRapportsMedecin($medecinId);

        // Affichage de la vue d'historique avec les données nécessaires
        include '../views/medecin/historique.php';  // Assurez-vous d'ajuster le chemin selon votre structure
    }
}
?>
