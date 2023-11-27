<?php

function connexion(){
    $host = 'localhost:3306';  
    $dbname = 'gestion_visite_db';  
    $username = 'root';  
    $password = ''; 

    try {
        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
