<?php
// models/Visiteur.php

require_once './config/database.php';

class Visiteur {
    private $connexionPDO;
    public $id; // changé en public pour un accès externe
    public $login; // changé en public pour un accès externe
    public $motDePasse; // changé en public pour un accès externe
    public $codePostal; // changé en public pour un accès externe
    public $ville; // changé en public pour un accès externe
    public $dateEmbauche; // changé en public pour un accès externe

    public function __construct($connexionPDO) 
    {
        $this->connexionPDO = $connexionPDO;
    }
    

    public function enregistrer() 
    {
        $query = "INSERT INTO Visiteur (login, motDePasse, codePostal, ville, dateEmbauche) 
        VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->connexionPDO->prepare($query);
    
        if ($stmt) {
            $success = $stmt->execute([$this->login, $this->motDePasse, $this->codePostal, $this->ville, $this->dateEmbauche]);
    
            if (!$success) {
                var_dump($stmt->errorInfo());
            }
    
            return $success;
        } else {
            return false;
        }
    }
    
}
?>
