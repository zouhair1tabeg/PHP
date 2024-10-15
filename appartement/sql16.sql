drop database if exists agence_immobiliere;
CREATE DATABASE agence_immobiliere;
USE agence_immobiliere;
CREATE TABLE Logements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adresse VARCHAR(255) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL, -- Appartement, Maison, etc.
    prix DECIMAL(15, 2) NOT NULL,
    surface INT NOT NULL, -- Surface en m2
    description TEXT
);

CREATE TABLE Clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telephone VARCHAR(20),
    adresse VARCHAR(255)
);

CREATE TABLE Agents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telephone VARCHAR(20)
);

CREATE TABLE Ventes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    logement_id INT,
    client_id INT,
    agent_id INT,
    date_vente DATE NOT NULL,
    montant DECIMAL(15, 2) NOT NULL,
    FOREIGN KEY (logement_id) REFERENCES Logements(id) ON DELETE CASCADE,
    FOREIGN KEY (client_id) REFERENCES Clients(id) ON DELETE CASCADE,
    FOREIGN KEY (agent_id) REFERENCES Agents(id) ON DELETE CASCADE
);

INSERT INTO Logements (adresse, ville, type, prix, surface, description) VALUES 
('123 Rue Exemple', 'Casablanca', 'Appartement', 1200000, 120, 'Appartement moderne avec vue sur la mer');

INSERT INTO Logements (adresse, ville, type, prix, surface, description) VALUES 
('456 Avenue Hassan II', 'Rabat', 'Appartement', 950000, 100, 'Appartement situé au centre-ville, proche de toutes commodités');

INSERT INTO Logements (adresse, ville, type, prix, surface, description) VALUES 
('789 Boulevard Zerktouni', 'Marrakech', 'Appartement', 700000, 80, 'Appartement avec jardin privatif, idéal pour les familles');

INSERT INTO Logements (adresse, ville, type, prix, surface, description) VALUES 
('321 Rue des Fleurs', 'Tanger', 'Appartement', 1100000, 110, 'Appartement lumineux avec vue sur la baie de Tanger');

INSERT INTO Logements (adresse, ville, type, prix, surface, description) VALUES 
('654 Rue de la Liberté', 'Agadir', 'Appartement', 850000, 90, 'Appartement spacieux avec terrasse, à proximité de la plage');
