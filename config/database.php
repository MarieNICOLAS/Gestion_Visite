<?php
// config/Database.php

class Database {
    private $host = 'localhost';
    private $dbname = 'gestion_visite_db';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Erreur de connexion à la base de données : " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>