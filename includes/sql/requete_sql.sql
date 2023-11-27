CREATE DATABASE gestion_visite_db;

CREATE TABLE Personne (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    adresse VARCHAR(255),
    telephone VARCHAR(20)
);

CREATE TABLE Visiteur (
    id INT PRIMARY KEY,
    login VARCHAR(255),
    motDePasse VARCHAR(255),
    codePostal VARCHAR(10),
    ville VARCHAR(255),
    dateEmbauche DATE,
    FOREIGN KEY (id) REFERENCES Personne(id)
);


CREATE TABLE Medecin (
    id INT PRIMARY KEY,
    specialiteComplementaire VARCHAR(255),
    departement VARCHAR(10),
    email VARCHAR(50),
    FOREIGN KEY (id) REFERENCES Personne(id)
);


CREATE TABLE Rapport (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    motif VARCHAR(255),
    bilan TEXT,
    idVisiteur INT,
    idMedecin INT,
    FOREIGN KEY (idVisiteur) REFERENCES Visiteur(id),
    FOREIGN KEY (idMedecin) REFERENCES Medecin(id)
);


CREATE TABLE Medicament (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomCommercial VARCHAR(255),
    idFamille INT,
    composition TEXT,
    effets TEXT,
    contreindications TEXT
);


CREATE TABLE Offrir (
    idRapport INT,
    idMedicament INT,
    quantite INT,
    PRIMARY KEY (idRapport, idMedicament),
    FOREIGN KEY (idRapport) REFERENCES Rapport(id),
    FOREIGN KEY (idMedicament) REFERENCES Medicament(id)
);


CREATE TABLE MedicamentFamille (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(255)
);
