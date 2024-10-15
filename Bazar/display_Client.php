<?php
session_start();
if (!isset($_SESSION['ClientID'])) {
    header('Location: login.php');
    exit();
}
else {
    $msg = "Hello " . ' '.($_SESSION["Nom"]);;
}

require 'db.php';

try {
    $stmt = $connexion->prepare("SELECT * FROM Produits");
    $stmt->execute();

    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        .cart-icon {
            position: fixed;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
        }

        .badge {
            position: absolute;
            top: -8px; 
            right: -8px; 
            font-size: 0.8rem;
            padding: 0.4em 0.6em;
            background-color: transparent; 
            color: black; 
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(to right, #ff3366, #ffcc33, #66ff66);
            background-size: cover;
            background-position: center;
        }
        h1{
            color:white;
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
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            z-index: -1; 
            opacity: 0; 
            transition: opacity 0.3s ease; 
            border-radius: 10px;
        }

        #pn:hover:after {
            opacity: 1;
        }

    </style>
</head>
<body>

<div class="cart-icon">
    <a href="panier.php">
        <img src="cart-icon.png" alt="Panier" style="width: 40px; height: 40px;">
        <span class="badge badge-pill badge-primary"> <?php echo count($_SESSION['panier'] ?? []); ?> </span>
    </a>
</div>

<div class="container">
    <h1><?php echo $msg?> <a href="logout.php" class="btn btn-danger">Logout</a></h1>
    
    <div class="row">
        <?php
        if (!empty($produits)) {
            foreach ($produits as $produit) {
                ?>
                <div class="col-md-4">
                    <div class="card mb-4" style="border-radius: 20px;">
                        <img style="height:300px; border-radius:20px;" class="card-img-top" src="<?php echo $produit['Photo']; ?> " alt="Image produit" >
                        <div class="card-body">
                            <h5 class="card-title">Nom: <?php echo $produit["Nom"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Catégorie: <?php echo $produit["Categorie"]; ?></h6>
                            <p class="card-text">Description: <?php echo $produit["Description"]; ?></p>
                            <p class="card-text">Stock: <?php echo $produit["Stock"]; ?></p>
                            <p class="card-text">Prix: <?php echo $produit["Prix"]; ?>MAD</p>

                            <form method="post" action="ajouter_au_panier.php">
                                <input type="hidden" name="ProduitID" value="<?php echo $produit['ProduitID']; ?>">
                                <div class="form-group">
                                    <label for="quantite_<?php echo $produit['ProduitID']; ?>">Quantité:</label>
                                    <input type="number" class="form-control" id="quantite_<?php echo $produit['ProduitID']; ?>" name="quantite" min="1" max="<?php echo $produit['Stock']; ?>" value="1">
                                </div>
                                <input id="pn" type="submit" value="Add to cart">
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>Aucun produit disponible.</p>";
        }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>