<?php

require 'db.php';

$AuteurID = intval($_POST['AuteurID']);
$Prenom = $_POST['Prenom'];
$Nom = $_POST['Nom'];
$CIN = $_POST['CIN'];
$Email = $_POST['Email']; 


$sql = "UPDATE Auteurs SET Prenom = :Prenom, Nom = :Nom,  CIN = :CIN, Email = :Email WHERE AuteurID = :AuteurID";
$stmt = $connexion->prepare($sql);
$stmt->bindParam(':Prenom', $Prenom);
$stmt->bindParam(':Nom', $Nom);
$stmt->bindParam(':CIN', $CIN);
$stmt->bindParam(':Email', $Email);
$stmt->bindParam(':AuteurID', $AuteurID);

if ($stmt->execute()) {
    echo "Données mises à jour avec succès.";
    header("Refresh:5 ; url=display_auteur.php");

} else {
    echo "Erreur lors de la mise à jour : " . $stmt->errorInfo()[2];
    header("Refresh:3 ; url=display_auteur.php");
}


?>