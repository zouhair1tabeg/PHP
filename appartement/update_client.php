<?php

require 'db.php';

$id = intval($_POST['id']);
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone']; 
$adresse = $_POST['adresse']; 


$sql = "UPDATE Clients SET nom = :nom, prenom = :prenom,  email = :email, telephone = :telephone , adresse = :adresse WHERE id = :id";
$stmt = $connexion->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telephone', $telephone);
$stmt->bindParam(':adresse', $adresse);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo "Données mises à jour avec succès.";
    header("Refresh:3 ; url=display_client.php");

} else {
    echo "Erreur lors de la mise à jour : " . $stmt->errorInfo()[2];
    header("Refresh:3 ; url=display_client.php");
}


?>