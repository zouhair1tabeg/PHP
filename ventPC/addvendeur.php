<?php

    require 'db.php';

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    $pwd = $_POST['pwd'];

    try{
        $sql = "INSERT INTO Vendeurs(nom , prenom , mail , tel , pwd) VALUE (:nom , :prenom , :mail , :tel , :pwd)";
        $stmt = $connexion->prepare($sql);

        $stmt->bindParam(':nom' , $nom);
        $stmt->bindParam(':prenom' , $prenom);
        $stmt->bindParam(':mail' , $mail);
        $stmt->bindParam(':tel' , $tel);
        $stmt->bindParam(':pwd' , $pwd);

        $stmt->execute();

        echo 'Les donnes ont ete inserees avec succes!';
    }
    
    catch(PDOException $e){
        die('Erreur :' . $e->getMessage());
    }

?>