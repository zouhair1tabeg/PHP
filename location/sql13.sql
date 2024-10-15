drop database if exists LocationVoitures;
CREATE DATABASE LocationVoitures;
USE LocationVoitures;


CREATE TABLE Clients (
    ClientID INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(100) NOT NULL,
    Prenom VARCHAR(100) NOT NULL,
    Adresse VARCHAR(255) NOT NULL,
    Telephone VARCHAR(20) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    MotDePasse VARCHAR(20)
);

CREATE TABLE Voitures (
    VoitureID INT AUTO_INCREMENT PRIMARY KEY,
    Marque VARCHAR(50) NOT NULL,
    Modele VARCHAR(50) NOT NULL,
    Annee INT NOT NULL,
    Immatriculation VARCHAR(20) UNIQUE NOT NULL,
    Disponibilite BOOLEAN NOT NULL DEFAULT TRUE
);


CREATE TABLE Locations (
    LocationID INT AUTO_INCREMENT PRIMARY KEY,
    ClientID INT,
    VoitureID INT,
    DateDebut DATE NOT NULL,
    DateFin DATE NOT NULL,
    PrixTotal DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (ClientID) REFERENCES Clients(ClientID),
    FOREIGN KEY (VoitureID) REFERENCES Voitures(VoitureID)
);

INSERT INTO Voitures (Marque, Modele, Annee, Immatriculation, Disponibilite) VALUES 
('Renault', 'Clio', 2018, 'AA-111-AA', TRUE),
('Peugeot', '308', 2020, 'BB-222-BB', TRUE),
('BMW', 'X5', 2021, 'CC-333-CC', FALSE),
('Audi', 'A4', 2019, 'DD-444-DD', TRUE),
('Mercedes', 'C-Class', 2022, 'EE-555-EE', TRUE);

select * from Voitures;
select * from Clients;
select * from Locations;