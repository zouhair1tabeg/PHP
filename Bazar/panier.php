<?php
session_start();

if (!isset($_SESSION['ClientID'])) {
    header('Location: login.php');
    exit();
}

require 'db.php';

$panier = isset($_SESSION['panier']) ? $_SESSION['panier'] : [];

$produits = [];
$total = 0;

if (!empty($panier)) {
    $ids = implode(',', array_keys($panier));
    $stmt = $connexion->prepare("SELECT * FROM Produits WHERE ProduitID IN ($ids)");
    $stmt->execute();
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($produits as $produit) {
        $produit_id = $produit['ProduitID'];
        $quantite = $panier[$produit_id];
        $total += $produit['Prix'] * $quantite;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        body{
            background: linear-gradient(to right, #ff3366, #ffcc33, #66ff66); 
        }
        #pn {
            border-radius: 10px; 
            color: white; 
            background-color: goldenrod; 
            padding: 1px 20px; 
            display: inline-block; 
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease; 
        }
        #pn:hover {
            background-color: #ffcc29; 
            transform: scale(1.05); 
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);  
        }

        #pn:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; 
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 10px;
        }

        #pn:hover:after {
            opacity: 1;
        }
        h1 , h3 , tbody{
            color: white;
        }
        th{
            color: black;
        }
    </style>
<div class="container">
    <h1>My cart</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($produits)) {
                foreach ($produits as $produit) {
                    $produit_id = $produit['ProduitID'];
                    $quantite = $panier[$produit_id];
                    $prix_total = $produit['Prix'] * $quantite;
                    ?>
                    <tr>
                        <td><?php echo $produit['Nom']; ?></td>
                        <td><?php echo $quantite; ?></td>
                        <td><?php echo $produit['Prix']; ?>MAD</td>
                        <td><?php echo $prix_total; ?>MAD</td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='4'>Votre panier est vide.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <h3>Total: <?php echo $total; ?>MAD</h3>
    <a href="traitement_paiement.php" class="btn btn-success" id="pn">Go to the checkout</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>