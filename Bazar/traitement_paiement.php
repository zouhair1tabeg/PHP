<?php
session_start();

if (!isset($_SESSION['ClientID'])) {
    header('Location: login.php');
    exit();
}

require 'db.php';


$panier = isset($_SESSION['panier']) ? $_SESSION['panier'] : [];
if (empty($panier)) {
    header('Location: panier.php');
    exit();
}

$total = 0;
$ids = implode(',', array_keys($panier));
$stmt = $connexion->prepare("SELECT ProduitID, Prix FROM Produits WHERE ProduitID IN ($ids)");
$stmt->execute();
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($produits as $produit) {
    $produit_id = $produit['ProduitID'];
    $quantite = $panier[$produit_id];
    $total += $produit['Prix'] * $quantite;
}

$CommandeID = substr(uniqid(), 0, 20); 
$Montant = $total;
$MethodePaiement = 'Carte de crédit';

try {
    $stmt = $connexion->prepare("INSERT INTO Paiements (CommandeID, Montant, MethodePaiement) VALUES (:CommandeID, :Montant, :MethodePaiement)");
    $stmt->bindParam(':CommandeID', $CommandeID, PDO::PARAM_STR);
    $stmt->bindParam(':Montant', $Montant, PDO::PARAM_STR);
    $stmt->bindParam(':MethodePaiement', $MethodePaiement, PDO::PARAM_STR);


    unset($_SESSION['panier']);

    $_SESSION['CommandeID'] = $CommandeID;
    $_SESSION['Montant'] = $Montant;
    $_SESSION['MethodePaiement'] = $MethodePaiement;
    header('Location: confirmation_paiement.php');
    exit();
} catch (PDOException $e) {
    echo 'Erreur de paiement : ' . $e->getMessage();
}
?>