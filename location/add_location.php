<?php
    require 'db.php';
    
    $DateDebut = $_POST['DateDebut'];
    $DateFin = $_POST['DateFin'];
    $PrixTotal = $_POST['PrixTotal'];
    $ClientID = $_POST['ClientID'];
    $VoitureID = $_POST['VoitureID'];

    try{
        $sql = "INSERT INTO Locations(DateDebut , DateFin , PrixTotal , ClientID , VoitureID) VALUE (:DateDebut , :DateFin , :PrixTotal , :ClientID , :VoitureID)";
        $stmt = $connexion->prepare($sql);

        $stmt->bindParam(':DateDebut' , $DateDebut);
        $stmt->bindParam(':DateFin' , $DateFin);
        $stmt->bindParam(':PrixTotal' , $PrixTotal);
        $stmt->bindParam(':ClientID' , $ClientID);
        $stmt->bindParam(':VoitureID' , $VoitureID);

        $stmt->execute();

        echo 'Votre location ajouter par succes!';
    }
    
    catch(PDOException $e){
        die('Erreur :' . $e->getMessage());
    }

?>