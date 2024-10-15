<?php

require 'db.php';

$id = $_GET['id'];

$stmt = $connexion->prepare('DELETE FROM Logements WHERE id = :id');
    
    
    $stmt->bindParam(':id', $id);
    
    
    $stmt->execute();

    echo "le Logements est supprimé";

    header("Refresh:2 ; url=display_logement.php");

?>