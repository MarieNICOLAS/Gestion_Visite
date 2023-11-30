<?php
// models/Produit.php

class Produit {
    // Propriétés de la classe Produit
    private $id;
    private $nomCommercial;
    private $composition;
    private $famille;
    // ... (autres propriétés)

    // Constructeur
    public function __construct($id, $nomCommercial, $composition, $famille) {
        $this->id = $id;
        $this->nomCommercial = $nomCommercial;
        $this->composition = $composition;
        $this->famille = $famille;
        // ... (initialisation des autres propriétés)
    }

    // Méthodes getters et setters
    public function getId() {
        return $this->id;
    }

    public function getNomCommercial() {
        return $this->nomCommercial;
    }

    public function getComposition() {
        return $this->composition;
    }

    public function getFamille() {
        return $this->famille;
    }

    // ... (autres getters et setters)
}
?>
