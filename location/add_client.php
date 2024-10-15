<?php
    require 'db.php';
    
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Adresse = $_POST['Adresse'];
    $Telephone = $_POST['Telephone'];
    $Email = $_POST['Email'];
    $MotDePasse = $_POST['MotDePasse'];

    try{
        $sql = "INSERT INTO Clients(Nom , Prenom , Adresse , Telephone , Email , MotDePasse) VALUE (:Nom , :Prenom , :Adresse , :Telephone , :Email , :MotDePasse)";
        $stmt = $connexion->prepare($sql);

        $stmt->bindParam(':Nom' , $Nom);
        $stmt->bindParam(':Prenom' , $Prenom);
        $stmt->bindParam(':Adresse' , $Adresse);
        $stmt->bindParam(':Telephone' , $Telephone);
        $stmt->bindParam(':Email' , $Email);
        $stmt->bindParam(':MotDePasse' , $MotDePasse);

        $stmt->execute();

        echo 'Votre etes inscrit par succes!';
    }
    
    catch(PDOException $e){
        die('Erreur :' . $e->getMessage());
    }

?>