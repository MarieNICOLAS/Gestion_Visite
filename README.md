# Gestion_Visites
Atelier professionnel BTS SIO 2 - SLAM 
Author : Marie NICOLAS / Romain BOURDON

Application à réaliser:

L’entreprise envisage de permettre aux visiteurs de gérer ses visites
par l’intermédiaire de son smartphone ou de sa tablette.

L’application devrait permettre de réaliser les cas d’utilisation suivants :


# CAS - GERER LES RAPPORTS DE VISITE 


**Scénario classique**

1.Le visiteur demande à créer un nouveau rapport de visite

2.Le système retourne un formulaire avec la liste des médecins et des champs de saisie

3.Le visiteur sélectionne un médecin à partir de son début de nom, sélectionne la date et remplit les différents 
champs, sélectionne les médicaments et les quantités offertes et valide

4.Le système enregistre le rapport


**Scénario étendu : modification d’un rapport**

5.Le visiteur demande à modifier un rapport

6.Le système retourne un formulaire avec une date à sélectionner 

7.Le visiteur sélectionne la date

8.Le système retourne les rapports que le visiteur a effectués à cette date

9.Le visiteur sélectionne un rapport de visite

10.Le système retourne les informations déjà saisies concernant le motif et le bilan

11.Le visiteur modifie les informations

12.Le système enregistre les modifications
	
**Scénario alternatif**

4.1 Des champs ne sont pas remplis, le système en informe le visiteur, retour à 3





# CAS : GERER LES MEDECINS


**Scénario classique**

1.Le visiteur demande à voir les informations concernant un médecin

2.Le système retourne un formulaire avec un champ de recherche du médecin

3.Le visiteur sélectionne un médecin à partir de son début de nom et valide

4.Le système retourne les informations personnelles concernant ce médecin

**Scénario étendu**

5.Le visiteur clique sur l’adresse de messagerie du médecin

6.Le système permet la rédaction et l’envoi d’un courriel

7.Le visiteur demande à voir tous les anciens rapports de visite concernant ce médecin

8.Le système retourne tous ses rapports

9.Le visiteur demande à modifier certains champs concernant des informations du médecin

10.Le système enregistre ces modifications


Architecture projet
gestionnaire_visites/
    index.php
    includes/
        classes/
            classe.php
        sql/
            requete_sql.sql
        utils/
            function.php
            inscription/
                espace_visiteur.php
                espace_medecin.php
                inscription_visiteur.php
                traitement.php
        view/
            header.php