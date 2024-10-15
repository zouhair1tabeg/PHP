<?php
require 'db.php';

$requiredFields = ['Nom', 'Description', 'Prix', 'Stock', 'Categorie' , 'Photo', 'ProduitID'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        echo "Veuillez remplir tous les champs du formulaire.";
        exit();
    }
}

$Nom = $_POST['Nom'];
$Description = $_POST['Description'];
$Prix = $_POST['Prix'];
$Stock = $_POST['Stock'];
$Categorie = $_POST['Categorie'];
$Photo = $_POST['Photo'];
$ProduitID = $_POST['ProduitID'];

try {
    $sql = "UPDATE Produits SET Nom = :Nom, Description = :Description, Prix = :Prix, Stock = :Stock, Categorie = :Categorie , Photo = :Photo WHERE ProduitID = :ProduitID";
    $stmt = $connexion->prepare($sql);

    $stmt->bindParam(':Nom', $Nom);
    $stmt->bindParam(':Description', $Description);
    $stmt->bindParam(':Prix', $Prix);
    $stmt->bindParam(':Stock', $Stock);
    $stmt->bindParam(':Categorie', $Categorie);
    $stmt->bindParam(':Photo', $Photo);
    $stmt->bindParam(':ProduitID', $ProduitID, PDO::PARAM_INT); 

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo 'Le Produit a été modifié avec succès';
    } else {
        echo 'Aucun changement n\'a été apporté au Produit';
    }
    header("Refresh: 3; url=display_Admin.php");
    exit();
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>