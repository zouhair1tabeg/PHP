<?php

require 'db.php';

$email =$_POST['email'];
$password =$_POST['pass'];

try{
    $stmt=$connexion->prepare("SELECT *FROM Clients WHERE email=:Email");
    $stmt->bindParam(':Email', $email);
    $stmt->execute();
    
    $user =$stmt->fetch();


    if($user && $password==$user['MotDePasse'] ){
        echo "Connexion réussie";
        session_start();
        $_SESSION["ClientID"]=$user["ClientID"];
        $_SESSION["Nom"]=$user["Nom"];
        $_SESSION["Email"]=$user["Email"];
        header("Refresh:2, url=display_Client.php");

    } else {
        echo "Email ou mot de passe incorrect";
        header("Refresh:2, url=login_Form_Client.php");
        
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>