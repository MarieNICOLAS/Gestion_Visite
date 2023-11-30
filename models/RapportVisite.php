<?php
// models/RapportVisite.php

class RapportVisite {
    // Propriétés de la classe RapportVisite
    private $id;
    private $date;
    private $motif;
    private $bilan;
    // ... (autres propriétés)

    // Constructeur
    public function __construct($id, $date, $motif, $bilan) {
        $this->id = $id;
        $this->date = $date;
        $this->motif = $motif;
        $this->bilan = $bilan;
        // ... (initialisation des autres propriétés)
    }

    // Méthodes getters et setters
    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getMotif() {
        return $this->motif;
    }

    public function getBilan() {
        return $this->bilan;
    }

    // ... (autres getters et setters)
}
?>
