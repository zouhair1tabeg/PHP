<?php

    require 'db.php';

    $Marque = $_POST['Marque'];
    $Modele = $_POST['Modele'];
    $Annee = $_POST['Annee'];
    $Immatriculation = $_POST['Immatriculation'];
    $Disponibilite = isset($_POST['Disponibilite']) ? 1 : 0;

    try{
        $sql = "INSERT INTO Voitures(Marque , Modele , Annee , Immatriculation , Disponibilite) VALUE (:Marque , :Modele , :Annee , :Immatriculation , :Disponibilite)";
        $stmt = $connexion->prepare($sql);

        $stmt->bindParam(':Marque' , $Marque);
        $stmt->bindParam(':Modele' , $Modele);
        $stmt->bindParam(':Annee' , $Annee);
        $stmt->bindParam(':Immatriculation' , $Immatriculation);
        $stmt->bindParam(':Disponibilite' , $Disponibilite);

        $stmt->execute();

        echo 'Votre voiture a ete ajouter avec succes!';
    }
    
    catch(PDOException $e){
        die('Erreur :' . $e->getMessage());
    }

?>