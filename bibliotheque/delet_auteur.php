<?php

require 'db.php';

$AuteurID = $_GET['id'];

$stmt = $connexion->prepare('DELETE FROM Auteurs WHERE AuteurID = :id');
    
    
    $stmt->bindParam(':id', $AuteurID);
    
    
    $stmt->execute();

    echo "le auteur est supprimé";

    header("Refresh:2 ; url=display_auteur.php");

?>