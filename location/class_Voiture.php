<?php

class Voiture {
    private $marque;
    private $modele;
    private $annee;
    private $prix;

    // Constructeur
    public function __construct($marque, $modele, $annee, $prix) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->prix = $prix;
    }

    // Getters
    public function getMarque() {
        return $this->marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function getPrix() {
        return $this->prix;
    }

    // Setters
    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    // Fonction toString
    public function __toString() {
        return "Voiture: Marque = " . $this->marque . ", Modele = " . $this->modele . ", Année = " . $this->annee . ", Prix = " . $this->prix . " DH";
    }
}
?>