<?php

require 'db.php';

$id = $_GET['id'];

$stmt = $connexion->prepare('DELETE FROM Clients WHERE id = :id');
    
    
    $stmt->bindParam(':id', $id);
    
    
    $stmt->execute();

    echo "le client est supprimé";

    header("Refresh:2 ; url=display_client.php");

?>