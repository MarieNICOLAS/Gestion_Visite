<?php
$page = $_GET['page'] ?? 'accueil'; 

switch ($page) {
    case 'espace_visiteur': // Modifier 'visite' à 'espace_visiteur'
        include 'controllers/VisiteController.php'; // Ajouter EspaceVisiteurController.php
        // Appeler la méthode appropriée en fonction de l'action
        $espaceVisiteur = new VisiteController;
        $espaceVisiteur->afficherPageEspaceVisiteur();
        // ...
        break;

    case 'espace_medecin': // Modifier 'medecin' à 'espace_medecin'
        include 'controllers/MedecinController.php'; // Ajouter EspaceMedecinController.php
        $espaceMedecin = new MedecinController;
        $espaceMedecin->afficherPageEspaceMedecin();
        break;

        case 'connexion-visiteur': // Modifier 'medecin' à 'espace_medecin'
            include 'controllers/VisiteController.php'; // Ajouter EspaceMedecinController.php
            $espaceVisiteur = new VisiteController;
            $espaceVisiteur->connexionVisiteur();
            break;
        
            case 'inscription-visiteur': // Modifier 'medecin' à 'espace_medecin'
                include 'controllers/VisiteController.php'; // Ajouter EspaceMedecinController.php
                $espaceVisiteur = new VisiteController;
                $espaceVisiteur->inscriptionVisiteur();
                break;

            case 'gestion-rapport': // Modifier 'medecin' à 'espace_medecin'
                include 'controllers/VisiteController.php'; // Ajouter EspaceMedecinController.php
                $espaceVisiteur = new VisiteController;
                $espaceVisiteur->gererLesRapport();
                break;
    

    default:
        include 'controllers/AccueilController.php';
        $accueilController = new AccueilController();
        $accueilController->afficherPageAccueil();
        break;
}
