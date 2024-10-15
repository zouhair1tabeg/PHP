drop database if exists BibliothequeDB;

CREATE DATABASE BibliothequeDB;


USE BibliothequeDB;


CREATE TABLE Auteurs (
    AuteurID INT AUTO_INCREMENT PRIMARY KEY,
    Prenom VARCHAR(50),
    Nom VARCHAR(50),
    CIN Varchar(10),
    Email VARCHAR(100)
);


CREATE TABLE Livres (
    LivreID INT AUTO_INCREMENT PRIMARY KEY,
    Titre VARCHAR(100),
    AuteurID INT,
    ISBN VARCHAR(20),
    AnneePublication INT,
    Genre VARCHAR(50),
    FOREIGN KEY (AuteurID) REFERENCES Auteurs(AuteurID)
);


CREATE TABLE Emprunteurs (
    EmprunteurID INT AUTO_INCREMENT PRIMARY KEY,
    Prenom VARCHAR(50),
    Nom VARCHAR(50),
    Email VARCHAR(100)
);


CREATE TABLE Emprunts (
    EmpruntID INT AUTO_INCREMENT PRIMARY KEY,
    LivreID INT,
    EmprunteurID INT,
    DateEmprunt DATE,
    DateRetourPrevue DATE,
    DateRetour DATE,
    FOREIGN KEY (LivreID) REFERENCES Livres(LivreID),
    FOREIGN KEY (EmprunteurID) REFERENCES Emprunteurs(EmprunteurID)
);

select * from Auteurs;
select * from Livres;