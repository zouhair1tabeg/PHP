<?php

    require 'db.php';

    $marque = $_POST['marque'];
    $ram = $_POST['ram'];
    $stockage = $_POST['stockage'];
    $prix = $_POST['prix'];
    $photo = $_POST['photo'];

    try{
        $sql = "INSERT INTO PC(marque , ram , stockage , prix , photo) VALUE (:marque , :ram , :stockage , :prix , :photo)";
        $stmt = $connexion->prepare($sql);

        $stmt->bindParam(':marque' , $marque);
        $stmt->bindParam(':ram' , $ram);
        $stmt->bindParam(':stockage' , $stockage);
        $stmt->bindParam(':prix' , $prix);
        $stmt->bindParam(':photo' , $photo);

        $stmt->execute();

        echo 'Le PC a ete ajputer avec succes!';
    }
    
    catch(PDOException $e){
        die('Erreur :' . $e->getMessage());
    }
    header("Refresh:2 ; url=formpc.html");
?>