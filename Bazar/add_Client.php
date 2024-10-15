<?php
    require 'db.php';
    
    $Nom = $_POST['Nom'];
    $Adresse = $_POST['Adresse'];
    $Telephone = $_POST['Telephone'];
    $Email = $_POST['Email'];
    $MotDePasse = $_POST['MotDePasse'];

    try{
        $sql = "INSERT INTO Clients(Adresse , Nom , Telephone , Email , MotDePasse) VALUE (:Adresse , :Nom , :Telephone , :Email , :MotDePasse)";
        $stmt = $connexion->prepare($sql);

        $stmt->bindParam(':Nom' , $Nom);
        $stmt->bindParam(':Adresse' , $Adresse);
        $stmt->bindParam(':Telephone' , $Telephone);
        $stmt->bindParam(':Email' , $Email);
        $stmt->bindParam(':MotDePasse' , $MotDePasse);

        $stmt->execute();

        echo 'Le client inscrit par succes!';
    }
    
    catch(PDOException $e){
        die('Erreur :' . $e->getMessage());
    }
    
    header("Refresh:2 ; url=creer_Compte.html");
    if(isset($_SESSION["Admins"]))
{
    echo 'vous etes déja authentifié';
    header("Refresh:2, url=login_Form_client.php");
} 
?>