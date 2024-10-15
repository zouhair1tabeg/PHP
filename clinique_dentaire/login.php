<?php

require 'db.php';

$email =$_POST['email'];
$password =$_POST['pass'];

try{
    $stmt=$connexion->prepare("SELECT *FROM patients WHERE email=:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    $user =$stmt->fetch();


    if($user && $password==$user['motDePasse'] ){
        echo "Connexion réussie";
        session_start();
        $_SESSION["patient_id"]=$user["patient_id"];
        $_SESSION["first_name"]=$user["first_name"];
        $_SESSION["last_name"]=$user["last_name"];
        header("Refresh:2, url=display_rdv.php");

    } else {
        echo "Email ou mot de passe incorrect";
        header("Refresh:2, url=login_form.php");
        
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>