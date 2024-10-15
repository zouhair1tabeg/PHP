<?php

require_once 'class_Voiture.php';

// Création d'un objet de type Voiture
$maVoiture = new Voiture("Honda", "Civic", 2019, 190000);

// Affichage de l'objet en utilisant la méthode __toString
echo $maVoiture;

// Test des getters
echo "\nMarque: " . $maVoiture->getMarque();
echo "\nModele: " . $maVoiture->getModele();
echo "\nAnnée: " . $maVoiture->getAnnee();
echo "\nPrix: " . $maVoiture->getPrix();

// Test des setters
$maVoiture->setMarque("Toyota");
$maVoiture->setModele("Corolla");
$maVoiture->setAnnee(2020);
$maVoiture->setPrix(200000);

// Affichage de l'objet modifié
echo "\n" . $maVoiture;
?>