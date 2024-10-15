<?php

    require 'db.php';

    $mail = $_POST['mail'];
    $password = $_POST['pwd'];

    try {
        
        $stmt = $connexion->prepare('SELECT * FROM Vendeurs WHERE mail = :mail');
        $stmt->bindParam(':mail', $mail);
    
        $stmt->execute();

        $user = $stmt->fetch();

        if ($user && $password==$user['pwd']) {
            echo "Connexion réussie";
            
            session_start();
        
            $_SESSION["vendeur_id"]=$user["idVendeur"];
            $_SESSION["nom"]=$user["nom"];
            $_SESSION["prenom"]=$user["prenom"];

            header("Refresh:2, url=display_card_pc.php");
        } else {
            echo "mail ou mot de passe incorrect";
            header("Refresh:2, url=login_Form.php");
        }

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

?>
