<?php

    require 'db.php';

    $Titre = $_POST['Titre'];
    $AuteurID = $_POST['AuteurID'];
    $ISBN = $_POST['ISBN'];
    $AnneePublication = $_POST['AnneePublication'];
    $Genre = $_POST['Genre'];

    try {
        $sql = "INSERT INTO Livres (Titre, AuteurID, ISBN, AnneePublication, Genre) VALUES (:Titre, :AuteurID, :ISBN, :AnneePublication, :Genre)";
        $stmt = $connexion->prepare($sql);

        $stmt->bindParam(':Titre', $Titre);
        $stmt->bindParam(':AuteurID', $AuteurID);
        $stmt->bindParam(':ISBN', $ISBN);
        $stmt->bindParam(':AnneePublication', $AnneePublication);
        $stmt->bindParam(':Genre', $Genre);

        $stmt->execute();

        echo 'Votre Livre a été ajouté avec succès!';
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }

?>