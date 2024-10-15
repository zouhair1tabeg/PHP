<?php

    require 'db.php';

    $Email = $_POST['email'];
    $password = $_POST['pass'];

    try {
        
        $stmt = $connexion->prepare('SELECT * FROM Clients WHERE Email = :Email');
        $stmt->bindParam(':Email', $Email);
    
        $stmt->execute();

        $user = $stmt->fetch();

        if ($user && $password==$user['MotDePasse']) {
            echo "Connexion réussie";
            
            session_start();
        
            $_SESSION["ClientID"]=$user["ClientID"];
            $_SESSION["Nom"]=$user["Nom"];
            $_SESSION["Prenom"]=$user["Prenom"];

            header("Refresh:2, url=display_car.php");
        } else {
            echo "Email ou mot de passe incorrect";
            header("Refresh:2, url=login_form.php");
        }

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

?>
