-- Création de la base de données
drop database if exists BazarMarocainDB;
CREATE DATABASE BazarMarocainDB;
USE BazarMarocainDB;



-- Table des clients
CREATE TABLE Clients (
    ClientID INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(100) NOT NULL,
    Adresse VARCHAR(255),
    Telephone VARCHAR(20),
    Email VARCHAR(100),
    MotDePasse VARCHAR(30)
);

CREATE TABLE Admins (
    AdminID INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(100) NOT NULL,
    Adresse VARCHAR(255),
    Telephone VARCHAR(20),
    Email VARCHAR(100),
    MotDePasse VARCHAR(30)
);


-- Table des produits
CREATE TABLE Produits (
    ProduitID INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(100) NOT NULL,
    Description TEXT,
    Prix DECIMAL(10, 2) NOT NULL,
    Stock INT NOT NULL,
    Categorie VARCHAR(100) NOT NULL,
    Photo text,
	AdminID INT,
	FOREIGN KEY (AdminID) REFERENCES Admins(AdminID)
);



-- Table des commandes
CREATE TABLE Commandes (
    CommandeID INT AUTO_INCREMENT PRIMARY KEY,
    ClientID INT,
    DateCommande DATETIME DEFAULT CURRENT_TIMESTAMP,
    MontantTotal DECIMAL(10, 2),
    Statut VARCHAR(50),
    FOREIGN KEY (ClientID) REFERENCES Clients(ClientID)
);

-- Table des détails de commande
CREATE TABLE DetailsCommande (
    DetailID INT AUTO_INCREMENT PRIMARY KEY,
    CommandeID INT,
    ProduitID INT,
    Quantite INT NOT NULL,
    FOREIGN KEY (CommandeID) REFERENCES Commandes(CommandeID),
    FOREIGN KEY (ProduitID) REFERENCES Produits(ProduitID)
);

-- Table des paiements
CREATE TABLE Paiements (
    PaiementID INT AUTO_INCREMENT PRIMARY KEY,
    CommandeID INT,
    DatePaiement DATETIME DEFAULT CURRENT_TIMESTAMP,
    Montant DECIMAL(10, 2),
    MethodePaiement VARCHAR(50),
    FOREIGN KEY (CommandeID) REFERENCES Commandes(CommandeID)
);


INSERT INTO Clients (Nom, Adresse, Telephone, Email, MotDePasse) VALUES
('Ahmed Benjelloun', '123 Rue Principale, Casablanca', '0600123456', 'ahmed.benjelloun@example.com','123456'),
('Fatima Zahra', '456 Avenue des Fleurs, Marrakech', '0700654321', 'fatima.zahra@example.com','123456');

INSERT INTO Admins (Nom, Adresse, Telephone, Email, MotDePasse) VALUES
('Wafi Ayman', '123 Rue Principale, Casablanca', '0600123456', 'wafi@example.com','123456'),
('Labyad Amine', '456 Avenue des Fleurs, Marrakech', '0700654321', 'labyad@example.com','123456');


-- Insertion des produits typiques d'un bazar marocain
INSERT INTO Produits (Nom, Description, Prix, Stock, Categorie, Photo, AdminID) VALUES
('Tapis marocain', 'Tapis berbère en laine', 1500.00, 10, 'Artisanat','https://cooparttissagetam.com/wp-content/uploads/2023/11/2.jpg',1),
('Babouches', 'Chaussures traditionnelles marocaines en cuir', 200.00, 50, 'Vêtements','https://www.babouche-maroc.com/images/babouches-ushuaia-doree-ouvert.jpg',2),
('Théière marocaine', 'Théière en métal pour le thé à la menthe', 250.00, 30, 'Cuisine','https://www.mavaisselle-store.com/2574-large_default/theiere-marocaine-artisanale-theiere-orientale-pour-service-a-the-marocain.jpg',1),
('Lampe en fer forgé', 'Lampe décorative artisanale en fer forgé', 350.00, 20, 'Décoration','https://hasnae.com/deco/wp-content/uploads/2014/09/lampes-marocaines-fer-forg%C3%A9-Hasnae.com-deco-3.jpg',2);





-- Insertion des commandes
INSERT INTO Commandes (ClientID, MontantTotal, Statut) VALUES 
(1, 1750.00, 'En cours');

-- Insertion des détails de commande
INSERT INTO DetailsCommande (CommandeID, ProduitID, Quantite) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 4, 1);

-- Insertion des paiements
INSERT INTO Paiements (CommandeID, Montant, MethodePaiement) VALUES 
(1, 1750.00, 'Carte de Crédit');