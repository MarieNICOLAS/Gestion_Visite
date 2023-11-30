<?php
// config/config.php

define('DB_HOST', 'localhost');
define('DB_NAME', 'gestion_visite_db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

function getPDOConnection()
{
    $dns = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    try
    {
        return new PDO($dns, DB_USER, DB_PASSWORD, $options);
    }
    catch (PDOException $e)
    {
        exit('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}