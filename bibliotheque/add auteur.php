<?php
    require 'db.php';
    
    $Prenom = $_POST['Prenom'];
    $Nom = $_POST['Nom'];
    $CIN = $_POST['CIN'];
    $Email = $_POST['Email'];

    try{
        $sql = "INSERT INTO Auteurs(Nom , Prenom , CIN , Email) VALUE (:Nom , :Prenom , :CIN , :Email)";
        $stmt = $connexion->prepare($sql);

        $stmt->bindParam(':Prenom' , $Prenom);
        $stmt->bindParam(':Nom' , $Nom);
        $stmt->bindParam(':CIN' , $CIN);
        $stmt->bindParam(':Email' , $Email);

        $stmt->execute();

        echo 'L\'Auteur inscrit par succes!';
    }
    
    catch(PDOException $e){
        die('Erreur :' . $e->getMessage());
    }
    
    header("Refresh:2 ; url=form.html");
?>