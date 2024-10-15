

drop database if exists Clinique_Dentaire;
create database Clinique_Dentaire;
use Clinique_Dentaire;

DROP TABLE IF EXISTS patient_treatments;
DROP TABLE IF EXISTS appointments;
DROP TABLE IF EXISTS treatments;
DROP TABLE IF EXISTS dentists;
DROP TABLE IF EXISTS patients;

-- Create patients table
CREATE TABLE patients (
    patient_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(100),
    address TEXT,
    motDePasse VARCHAR(255) NOT NULL
);

-- Create dentists table
CREATE TABLE dentists (
    dentist_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    motDePasse VARCHAR(255) NOT NULL
);

-- Create appointments table
CREATE TABLE appointments (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    dentist_id INT NOT NULL,
    appointment_date DATETIME NOT NULL,
    reason TEXT,
    status ENUM('Scheduled', 'Completed', 'Cancelled') DEFAULT 'Scheduled',
    FOREIGN KEY (patient_id) REFERENCES patients(patient_id),
    FOREIGN KEY (dentist_id) REFERENCES dentists(dentist_id)
);

-- Create treatments table
CREATE TABLE treatments (
    treatment_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    cost DECIMAL(10, 2) NOT NULL
);

-- Create patient_treatments table
CREATE TABLE patient_treatments (
    patient_treatment_id INT AUTO_INCREMENT PRIMARY KEY,
    appointment_id INT NOT NULL,
    treatment_id INT NOT NULL,
    cost DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (appointment_id) REFERENCES appointments(appointment_id),
    FOREIGN KEY (treatment_id) REFERENCES treatments(treatment_id)
);

-- Insert sample patients
INSERT INTO patients (first_name, last_name, phone, email, address, motDePasse) VALUES
('Ali', 'Ben Salah', '1234567890', 'ali.bensalah@example.com', '123 Rue Maple', 'password123'),
('Wafi', 'fatima', '0987654321', 'fatima.elzohra@example.com', '456 Avenue Oak', 'password456');

-- Insert sample dentists
INSERT INTO dentists (first_name, last_name, phone, email, motDePasse) VALUES
('Ayman', 'Hassan', '1231231234', 'ayman.hassan@example.com', 'dentistpass1'),
('Leila', 'Mansour', '4321432143', 'leila.mansour@example.com', 'dentistpass2');

-- Insert sample treatments
INSERT INTO treatments (name, description, cost) VALUES
('Nettoyage', 'Nettoyage dentaire de routine', 75.00),
('Plombage', 'Plombage d\'une carie', 150.00);

-- Insert sample appointments
INSERT INTO appointments (patient_id, dentist_id, appointment_date, reason, status) VALUES
(1, 1, '2024-06-10 10:00:00', 'Contrôle de routine', 'Scheduled'),
(2, 2, '2024-06-11 14:00:00', 'Douleur dentaire', 'Scheduled');

-- Insert sample patient treatments
INSERT INTO patient_treatments (appointment_id, treatment_id, cost) VALUES
(1, 1, 75.00),
(2, 2, 150.00);


