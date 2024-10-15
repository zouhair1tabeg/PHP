<?php
session_start();
require 'db.php';

$email =$_POST['email'];
$password =$_POST['pass'];

try{
    $stmt=$connexion->prepare("SELECT *FROM Admins WHERE email=:Email");
    $stmt->bindParam(':Email', $email);
    $stmt->execute();
    
    $user =$stmt->fetch();


    if($user && $password==$user['MotDePasse'] ){
        echo "Connexion réussie";
        
        $_SESSION["AdminID"]=$user["AdminID"];
        $_SESSION["Nom"]=$user["Nom"];
        
        header("Refresh:2, url=display_Admin.php");

    } else {
        echo "Email ou mot de passe incorrect";
        header("Refresh:2, url=login_Form_Admin.php");
        
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>