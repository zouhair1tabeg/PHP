<?php
require 'db.php';

$requiredFields = ['marque', 'ram', 'stockage', 'prix', 'photo', 'idPC'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        echo "Veuillez remplir tous les champs du formulaire.";
        exit();
    }
}

$marque = $_POST['marque'];
$ram = $_POST['ram'];
$stockage = $_POST['stockage'];
$prix = $_POST['prix'];
$photo = $_POST['photo'];
$idPC = $_POST['idPC'];

try {
    $sql = "UPDATE PC SET marque = :marque, ram = :ram, stockage = :stockage, prix = :prix, photo = :photo WHERE idPC = :idPC";
    $stmt = $connexion->prepare($sql);

    $stmt->bindParam(':marque', $marque);
    $stmt->bindParam(':ram', $ram);
    $stmt->bindParam(':stockage', $stockage);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':photo', $photo);
    $stmt->bindParam(':idPC', $idPC, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo 'Le PC a été modifié avec succès';
    } else {
        echo 'Aucun changement n\'a été apporté au PC';
    }
    header("Refresh: 3; url=display_card_pc.php");
    exit();
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>
