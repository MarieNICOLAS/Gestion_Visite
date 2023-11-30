<?php
// models/Medecin.php

class Medecin {
    // Propriétés de la classe Medecin
    private $id;
    private $nom;
    private $prenom;
    private $specialite;
    // ... (autres propriétés)

    // Constructeur
    public function __construct($id, $nom, $prenom, $specialite) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->specialite = $specialite;
        // ... (initialisation des autres propriétés)
    }

    // Méthodes getters et setters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getSpecialite() {
        return $this->specialite;
    }

    // ... (autres getters et setters)
}
?>
