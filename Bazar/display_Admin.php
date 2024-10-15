<?php
session_start();
if (!isset($_SESSION['AdminID'])) {
    header('Location: login.php');
    exit();
}
else {
    $msg = "Hello " . ' '.($_SESSION["Nom"]);;
}


require 'db.php';

$adminID = $_SESSION['AdminID'];

try {
    $stmt = $connexion->prepare("SELECT * FROM Produits WHERE AdminID = :adminID");
    $stmt->bindParam(':adminID', $adminID);
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
</head>
<body>
    <style>
        .card a {
            text-decoration: none;
            color: inherit;
        }

        .card a:hover {
            text-decoration: none;
            color: inherit;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('bz3.jpg')no-repeat;
            background-size: cover;
            background-position: center;
        }
        h1 , h2{
            color:white;
        }
    </style>
<div class="container">
    <h1><?php echo $msg?> <a href="logout.php" class="btn btn-danger">Logout</a></h1>
    <h2>List of Products <a href="add_product.php" class="btn btn-info">Add product</a></h2>
    <div class="row">
        <?php
        if (!empty($produits)) {
            foreach ($produits as $produit) {
                ?>
                <div class="col-md-4">
                    <div class="card mb-4" style="border-radius: 20px;">
                        <div class="card-body">
                            <a href="update_form.php?ProduitID=<?php echo $produit['ProduitID']; ?>">
                                <img style="height:300px; border-radius:20px;" class="card-img-top" src="<?php echo $produit['Photo']; ?>" alt="Image produit">
                                <h5 class="card-title">Nom: <?php echo $produit["Nom"]; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Catégorie: <?php echo $produit["Categorie"]; ?></h6>
                                <p class="card-text">Description: <?php echo $produit["Description"]; ?></p>
                                <p class="card-text">Stock: <?php echo $produit["Stock"]; ?></p>
                                <p class="card-text">Prix: <?php echo $produit["Prix"]; ?>MAD</p>
                            </a>
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