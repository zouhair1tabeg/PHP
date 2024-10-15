<?php
session_start();
require 'db.php';

$pc = $_GET['ProduitID'];

try {
    $connexion->beginTransaction();

    $stmt = $connexion->prepare("DELETE FROM DetailsCommande WHERE ProduitID = :ProduitID");
    $stmt->bindParam(':ProduitID', $pc, PDO::PARAM_INT);
    $stmt->execute();

    $stmt = $connexion->prepare("DELETE FROM Produits WHERE ProduitID = :ProduitID");
    $stmt->bindParam(':ProduitID', $pc, PDO::PARAM_INT);
    $stmt->execute();

    $connexion->commit();

    echo 'Le produit et les détails associés ont été supprimés.';
} catch (PDOException $e) {
    $connexion->rollBack();
    echo 'Erreur : ' . $e->getMessage();
}

header("Refresh:2; url=display_Admin.php");
exit;
?>