<?php
session_start();

if (!isset($_POST['ProduitID']) || !isset($_POST['quantite'])) {
    header('Location: display_Client.php');
    exit();
}

$ProduitID = $_POST['ProduitID'];
$quantite = $_POST['quantite'];

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

if (isset($_SESSION['panier'][$ProduitID])) {
    $_SESSION['panier'][$ProduitID] += $quantite;
} else {
    $_SESSION['panier'][$ProduitID] = $quantite;
}

header('Location: display_Client.php');
exit();
?>
