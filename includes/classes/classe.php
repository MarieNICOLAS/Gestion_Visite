<?php
    class Personne {
        protected $id;
        protected $nom;
        protected $prenom;
        protected $adresse;
        protected $telephone;
        
        public function __construct($id, $nom, $prenom, $adresse, $telephone) 
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->telephone = $telephone;
        }
        
        // Getters et Setters pour les propriétés
        // ...
    
    }
    
    class Visiteur extends Personne {
        protected $login;
        protected $motDePasse;
        protected $codePostal;
        protected $ville;
        protected $dateEmbauche;
        
        public function __construct($id, $nom, $prenom, $adresse, $telephone, $login, $motDePasse, $codePostal, $ville, $dateEmbauche) {
            parent::__construct($id, $nom, $prenom, $adresse, $telephone);
            $this->login = $login;
            $this->motDePasse = $motDePasse;
            $this->codePostal = $codePostal;
            $this->ville = $ville;
            $this->dateEmbauche = $dateEmbauche;
        }
        
        // Getters et Setters pour les propriétés spécifiques aux visiteurs
        // ...
    }
    
    class Medecin extends Personne {
        protected $specialiteComplementaire;
        protected $departement;
        
        public function __construct($id, $nom, $prenom, $adresse, $telephone, $specialiteComplementaire, $departement) {
            parent::__construct($id, $nom, $prenom, $adresse, $telephone);
            $this->specialiteComplementaire = $specialiteComplementaire;
            $this->departement = $departement;
        }
        
        // Getters et Setters pour les propriétés spécifiques aux médecins
        // ...
    }
    
    class Rapport {
        protected $id;
        protected $date;
        protected $motif;
        protected $bilan;
        protected $idVisiteur;
        protected $idMedecin;
        
        public function __construct($id, $date, $motif, $bilan, $idVisiteur, $idMedecin) {
            $this->id = $id;
            $this->date = $date;
            $this->motif = $motif;
            $this->bilan = $bilan;
            $this->idVisiteur = $idVisiteur;
            $this->idMedecin = $idMedecin;
        }
        
        // Getters et Setters pour les propriétés de la classe Rapport
        // ...
    }
    
    class Medicament {
        protected $id;
        protected $nomCommercial;
        protected $idFamille;
        protected $composition;
        protected $effets;
        protected $contreindications;
        
        public function __construct($id, $nomCommercial, $idFamille, $composition, $effets, $contreindications) {
            $this->id = $id;
            $this->nomCommercial = $nomCommercial;
            $this->idFamille = $idFamille;
            $this->composition = $composition;
            $this->effets = $effets;
            $this->contreindications = $contreindications;
        }
        
        // Getters et Setters pour les propriétés de la classe Medicament
        // ...
    }
    
    class Offrir {
        protected $idRapport;
        protected $idMedicament;
        protected $quantite;
        
        public function __construct($idRapport, $idMedicament, $quantite) {
            $this->idRapport = $idRapport;
            $this->idMedicament = $idMedicament;
            $this->quantite = $quantite;
        }
        
        // Getters et Setters pour les propriétés de la classe Offrir
        // ...
    }
    
    class MedicamentFamille {
        protected $id;
        protected $libelle;
        
        public function __construct($id, $libelle) {
            $this->id = $id;
            $this->libelle = $libelle;
        }
        
        // Getters et Setters pour les propriétés de la classe MedicamentFamille
        // ...
    }
    
?>